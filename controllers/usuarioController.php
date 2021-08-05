<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoCensoMuni/routes.php');
include_once (MODEL_PATH.'usuario.php');
include_once (MODEL_PATH.'rol.php');
include_once ('conexion.php');

class usuarioController{
   
    public function contarRegistros($buscar){

        try
        {
            $conexion = new Conexion();
            $sql = "SELECT COUNT(*) AS total_registros FROM tbl_usuario WHERE 
                    (id_usuario LIKE '%$buscar%' OR nombre LIKE '%$buscar%' OR usuario LIKE '%$buscar%')";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $registro = $stmt->fetch(PDO::FETCH_OBJ);

            return $registro->total_registros;
        }catch(Exception $e)
        {
            echo 'Error '. $e;
        }
        
    }
    
    
    public function listar($buscar, $desde, $hasta)
    {
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT u.id_usuario, u.nombre, u.usuario, r.nombre AS rol, u.estado FROM tbl_usuario AS u INNER JOIN tbl_rol AS r ON u.rol = r.id_rol WHERE 
                    (u.id_usuario LIKE '%$buscar%' OR u.nombre LIKE '%$buscar%' OR u.usuario LIKE '%$buscar%') ORDER BY nombre ASC LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $u = new Usuario();
    
                $u->set('id_usuario', $registro->id_usuario);
                $u->set('nombre', $registro->nombre);
                $u->set('usuario', $registro->usuario);
                $u->set('rol', $registro->rol);
                $u->set('estado', $registro->estado);
                
                $resultado[] = $u;
            }

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    
    public function buscarUsuario($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
            $sql = $conexion->pdo->prepare("SELECT id_usuario, nombre, usuario, rol, estado, fecha_commit, fecha_update FROM tbl_usuario WHERE id_usuario = ?;");
            $sql->execute(array($id));

            $registro = $sql->fetch(PDO::FETCH_OBJ);
            
            $u = new Usuario();
    
            $u->set('id_usuario', $registro->id_usuario);
            $u->set('nombre', $registro->nombre);
            $u->set('usuario', $registro->usuario);
            $u->set('rol', $registro->rol);
            $u->set('estado', $registro->estado);
            $u->set('fecha_commit', $registro->fecha_commit);
            $u->set('fecha_update', $registro->fecha_update);
                
            return $u;
            

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function guardar(Usuario $u){
        try
        {
            $sql = "INSERT INTO tbl_usuario (nombre, usuario, rol, password, estado) VALUES (?,?,?,?,1)";

            $conexion = new Conexion();
            $resultado = $conexion->pdo->prepare($sql)->execute(
                array(
                    $u->get('nombre'),
                    $u->get('usuario'),
                    $u->get('rol'),
                    $u->get('password'),
                )
            );

            return $resultado;
        }
        catch (Exception $e)
        {
            echo "error";
        }
    }

    public function editar(Usuario $u)
    {
        try
        {
            $conexion = new Conexion();
            $sql = "UPDATE tbl_usuario SET nombre=?, usuario=?, rol=? WHERE id_usuario=?";
            
            $resultado = $conexion->pdo->prepare($sql)->execute(
                array(
                    $u->get('nombre'),
                    $u->get('usuario'),
                    $u->get('rol'),
                    $u->get('id_usuario')
                )
            );

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function editarPassword($id, $password)
    {
        try
        {
            $conexion = new Conexion();
            $sql = "UPDATE tbl_usuario SET password=? WHERE id_usuario=?";
            
            $resultado = $conexion->pdo->prepare($sql)->execute(
                array(
                    $password, $id
                )
            );

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function inactivar($id)
    {
        try
        {
            $conexion = new Conexion();
            $sql = "UPDATE tbl_usuario SET estado=0 WHERE id_usuario=?";
            
            $resultado = $conexion->pdo->prepare($sql)->execute(
                array($id)
            );

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function activar($id)
    {
        try
        {
            $conexion = new Conexion();
            $sql = "UPDATE tbl_usuario SET estado=1 WHERE id_usuario=?";
            
            $resultado = $conexion->pdo->prepare($sql)->execute(
                array($id)
            );

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

   
    public function login($usuario, $pass){
        try
        {
            $conexion = new Conexion();
            $sql = "SELECT id_usuario, nombre, usuario, password, rol FROM tbl_usuario WHERE usuario = ? AND estado=1;";
        
            $stmt = $conexion->pdo->prepare($sql);

            $stmt->execute(array($usuario));

            if($stmt->rowCount()){
                $registro = $stmt->fetch(PDO::FETCH_OBJ);
                if($registro){
                    if(password_verify($pass, $registro->password)){
                        session_start();
                        $_SESSION['id_usuario'] = $registro->id_usuario;
                        $_SESSION['usuario'] = $registro->usuario;
                        $_SESSION['nombre_usuario'] = $registro->nombre;
                        $_SESSION['rol'] = $registro->rol;

                        return "exito";
                    }else{
                        return "fallo";
                    }
                }
            }else{
                return "fallo";
            }
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    public function listarRoles(){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT * FROM tbl_rol;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = new Rol();
    
                $r->set('id_rol', $registro->id_rol);
                $r->set('nombre', $registro->nombre);
                $r->set('descripcion', $registro->descripcion);
                
                $resultado[] = $r;
            }

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    
}

?>