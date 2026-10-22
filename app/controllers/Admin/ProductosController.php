<?php

namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Admin\Categorias;
use App\Models\Admin\Productos;

// Controlador de productos para el administrador
class ProductosController extends Controller
{
    // Modelo de categorías
    protected $categoriasModel;
    // Modelo de productos
    protected $productosModel;

    // Constructor
    public function __construct()
    {
        // Inicializa el modelo de categorías
        $this->categoriasModel = new Categorias();
        // Inicializa el modelo de productos
        $this->productosModel = new Productos();
    }

    // Muestra el listado de productos
    public function index()
    {
        $productos = $this->productosModel->buscar();

        // Carga la vista principal de productos
        $this->view('admin/productos/index', [
            'isAdmin'   => true,
            'module'    => 'admin',
            'pageTitle' => 'Productos',
            'productos' => $productos
        ]);
        exit;
    }

    // Muestra el formulario para crear un nuevo producto
    public function nuevo()
    {
        //categoria dinamica de la base de datos
        $categorias = $this->categoriasModel->categorias_selec();
        // Carga la vista del formulario
        $this->view('admin/productos/nuevo', [
            'isAdmin'   => true,
            'module'    => 'admin',
            'pageTitle' => 'Nuevo Producto',
            'categorias' => $categorias
        ]);
        exit;
    }

    //FUNCION PARA GUARDAR 
    public function guardar()
    {
        $data = $_POST;
        if (!empty($data['categoria']) && !empty($data['codigo']) && !empty($data['nombre']) && !empty($data['descripcion']) && !empty($data['precio']) && !empty($data['stock'])) {

            $resultado = $this->productosModel->registar($data);
            if ($resultado) {
                // Notificar al usuario que se registró correctamente
                $_SESSION['flash_success'] = 'Producto registrado correctamente';
                header('Location: ' . BASE_URL . '/admin/productos/nuevo');
                exit;
            } else {
                // Notificar al usuario que hubo un error
                $_SESSION['flash_error'] = 'Error al registrar el producto';
                header('Location: ' . BASE_URL . '/admin/productos/nuevo');
                exit;
            }
        } else {
            $_SESSION['flash_error'] = 'Todos los campos son obligatorios';
            header('Location: ' . BASE_URL . '/admin/productos/nuevo');
            exit;
        }
    }
    //metodo editar
    public function editar($id)
    {
        // Estas categorías se utilizan para llenar el selector del formulario.
        $categorias = $this->categoriasModel->categorias_selec();
        //buscar un producto por id
        $producto = $this->productosModel->ver($id);
        //var_dump($producto); 
        // Envía a la vista los datos necesarios para renderizar el formulario.
        $this->view('admin/productos/editar', [
            'isAdmin'   => true,
            'module'    => 'admin',
            'pageTitle' => 'editar Producto',
            'categorias' => $categorias,
            'producto' => $producto
        ]);
        exit;
    }

    //metodo actualizar
    public function actualizar()
    {
        $data = $_POST;
        if (!empty($data['categoria']) && !empty($data['codigo']) && !empty($data['nombre']) && !empty($data['descripcion']) && !empty($data['precio']) && !empty($data['stock'])) {
            // actualizar el producto
            $respuesta = $this->productosModel->actualizar($data);
            if ($respuesta) {
                //notificar al usuario que el producto se guardo correctamente
                $_SESSION['flash_success'] = "Producto actualizado correctamente";
                //redireccion a la lista de productos
                header('Location: ' . BASE_URL . '/admin/productos');
            } else {
                //notificar al usuario que hubo un error al guardar el producto
                $_SESSION['flash_error'] = "Error al actualizar el producto";
                //redireccion al formulario de nuevo producto
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        } else {
            $_SESSION['flash_error'] = "Error: Campos vacíos";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
