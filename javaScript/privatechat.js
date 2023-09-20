function clearprivatechat(id){
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST","clear_private_chat.php?get_id="+id, true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                alert(xhr.response);
            }
        }
    }
    xhr.send();
}