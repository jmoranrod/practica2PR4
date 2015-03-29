function deleteGame(id,name){
    if(!confirm("Desea borrar '"+name+"'")){
        return;
    }
    var ajax= new XMLHttpRequest();
    ajax.onreadystatechange=function(){
        if(this.readyState== 4 && this.status == 200) {
            var res= JSON.parse(this.responseText); //resultado formato JSON {deleted:lógico}
            if(res.deleted === true){
                var fila=document.querySelector('#fila'+id); //Se usa id por la clausura
                fila.parentNode.removeChild(fila); //Eliminamos la fila del juego
            }
        }
    }
    ajax.open("post","delete_users_json.php");
    ajax.setRequestHeader("Content-Type","application/json;charset=UTF-8");
    ajax.send(JSON.stringify({"id":id})); //Formato {id:identificador de registro a borrar}
}