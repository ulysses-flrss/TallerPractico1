<?php

class Producto {

    // Atributos
    private $codigo;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $categoria;
    private $precio;
    private $existencias;

    
// Getters
    public function getCodigo () {
        return $this->codigo;
    }

    public function getNombre () {
        return $this->nombre;
    }

    public function getDescripcion () {
        return $this->descripcion;
    }

    public function getImagen () {
        return $this->imagen;
    }

    public function getCategoria () {
        return $this->categoria;
    }

    public function getPrecio () {
        return $this->precio;
    }

    public function getExistencias () {
        return $this->existencias;
    }


// Setters
    public function setCodigo ($_codigo) {
        $this->codigo = $_codigo;
    }

    public function setNombre ($_nombre) {
        $this->nombre = $_nombre;
    }

    public function setDescripcion ($_descripcion) {
        $this->descripcion = $_descripcion;
    }

    public function setImagen ($_imagen) {
        $this->imagen = $_imagen;
    }

    public function setCategoria ($_categoria) {
        $this->categoria = $_categoria;
    }

    public function setPrecio ($_precio) {
        $this->precio = $_precio;
    }

    public function setExistencias ($_existencias) {
        $this->existencias = $_existencias;
    }


// Metodos
    public function registrarProducto () {
        extract($_POST);
        $productos = simplexml_load_file("xml/productos.xml");

        $producto = $producto->addChild('producto');

        $producto->addChild('codigo',$codigo);
        $producto->addChild('nombre',$nombre);
        $producto->addChild('descripcion',$descripcion);
        $producto->addChild('imagen',$imagen);
        $producto->addChild('categoria',$categoria);
        $producto->addChild('precio',$precio);
        $producto->addChild('existencias',$existencias);


        file_put_contents("productos.xml", $productos->asXML());
    }

    public function verProductos () {
        $codigo = $_GET['codigo'];
        $productos = simplexml_load_file('xml/producto.xml');
        $index = 0;
        $i= 0;
    
        foreach($productos->producto as $prod){
            if($prod->codigo == $codigo){
                $index = $i;
                break;
            }
            $i++;
        }
    
        unset($productos->producto[$index]);
    
        file_put_contents("productos.xml", $productos->asXML());
    }

    public function modificarProducto () {
        extract($_POST);
        $producto = simplexml_load_file("xml/producto.xml");

        $index = 0;
        $i= 0;

        foreach($productos->producto as $prod){
            if($prod->codigo == $codigo){
                $index = $i;
                break;
            }
            $i++;
        }

        unset($productos->producto[$index]);

        $producto = $productos->addChild('producto');

        $producto->addChild('codigo',$_codigo);
        $producto->addChild('nombre',$_nombre);
        $producto->addChild('descripcion',$_descripcion);
        $producto->addChild('imagen',$_imagen);
        $producto->addChild('categoria',$_categoria);
        $producto->addChild('precio',$_precio);
        $producto->addChild('existencias',$_existencias);

        file_put_contents("productos.xml", $productos->asXML());

        header('location:index.php');
    }

    public function eliminarProducto () {
        $codigo = $_GET['codigo'];
        $productos = simplexml_load_file('class/productos.xml');
        $index = 0;
        $i= 0;
    
        foreach($productos->producto as $prod){
            if($prod->codigo == $codigo){
                $index = $i;
                break;
            }
            $i++;
        }
    
        unset($productos->producto[$index]);
    
        file_put_contents("productos.xml", $productos->asXML());
    }
}

?>