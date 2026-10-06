<?php
namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Admin\Categorias;

// Controlador de productos para el administrador
class ProductosController extends Controller
{
    // Modelo de categorías
    protected $categoriasModel;
    
    // Constructor
    public function __construct() {
        // Inicializa el modelo de categorías
        $this->categoriasModel = new Categorias();
    }

    // Muestra el listado de productos
    public function index()
    {
        // Carga la vista principal de productos
        $this->view('admin/productos/index', [
            'isAdmin'   => true,
            'module'    => 'admin',
            'pageTitle' => 'Productos'
        ]);
        exit;
    }

    // Muestra el formulario para crear un nuevo producto
    public function nuevo(){
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
}