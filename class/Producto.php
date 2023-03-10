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
        
        $productos = simplexml_load_file("../xml/productos.xml");

        $producto = $productos->addChild('producto');
        
        $producto->addChild('codigo',$codigo);
        $producto->addChild('nombre',$nombre);
        $producto->addChild('descripcion',$descripcion);
        $ruta = $this->guardarImagen();
        $producto->addChild('imagen',$ruta);
        $producto->addChild('categoria',$categoria);
        $producto->addChild('precio',$precio);
        $producto->addChild('existencias',$existencias);


        file_put_contents("../xml/productos.xml", $productos->asXML());
    }

    public function verProductos () {
        $codigo = $_GET['codigo'];
        $productos = simplexml_load_file('../xml/producto.xml');
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
    
        file_put_contents("../xml/productos.xml", $productos->asXML());
    }

    public function modificarProducto () {
        extract($_POST);
        $productos = simplexml_load_file("../xml/productos.xml");


        foreach($productos->producto as $prod){
            if($prod->codigo == $codigo){

            $prod->codigo = $codigo;
            $prod->nombre = $nombre;
            $prod->descripcion = $descripcion;
            $prod->precio = $precio;
            $prod->categoria = $categoria;
            $prod->existencias = $existencias;
            }
        }

        file_put_contents("../xml/productos.xml", $productos->asXML());

        header('location:verProductos.php');
    }

    public function eliminarProducto () {
        $codigo = $_GET['codigo'];
        $productos = simplexml_load_file('../xml/productos.xml');
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
    
        file_put_contents("../xml/productos.xml", $productos->asXML());
        header('location:verProductos.php');
    }

    public function guardarImagen(){
        $ruta_destino = "";
        if(isset($_FILES['imagen'])) {
            $imagen = $_FILES['imagen'];
            $nombre = $imagen['name'];
            $tipo = $imagen['type'];
            $ruta_temporal = $imagen['tmp_name'];
            $error = $imagen['error'];
            
            if($error === UPLOAD_ERR_OK) {
                $directorio_destino = '../img/';
                $ruta_destino = $directorio_destino . $nombre;
                move_uploaded_file($ruta_temporal, $ruta_destino);
                echo "Imagen guardada correctamente en $ruta_destino";
                return $nombre;
            } else {
                echo "Error al subir la imagen";
            }
        }

    }

    public static function validar(){
        include_once("../class/Validaciones.php");
            extract($_POST);
                
        
        
             //Validacion codigo
        if(!isset($codigo)||estaVacio($codigo)){
            array_push($errores, "Desbes ingresar el codigo");
        } else if(!esCodigo($codigo)){
            array_push($errores, "El codigo debe tener los parametros PROD#####");
        }

        //Validacion nombre
        if(!isset($nombre)||estaVacio($nombre)){
            array_push($errores, "Debes ingresar el nombre");
        } else if (!esTexto($nombre)){
            array_push($errores, "El nombre debe contener solo letras");
        }

        //Validacion descripcion
        if(!isset($descripcion)||estaVacio($descripcion)){
            array_push($errores, "Debes ingresar la descripcion");
        }


        //Validacion precio
        if(!isset($precio)||estaVacio($precio)){
            array_push($errores, "Debes ingresar el precio");
        } else if (!esPrecio($precio)){
            array_push($errores, "El precio debe ser un numero");
        }
        //Validacion existencias
        if(!isset($existencias)||estaVacio($existencias)){
            array_push($errores, "Debes ingresar las existencias");
        } else if (!esExistencia($existencias)){
            array_push($errores, "Las existencias deben ser un numero");
        }
        
        return $errores;
    }
}

?>