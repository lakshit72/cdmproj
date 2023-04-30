const btn = document.getElementById('signup')
const txt = document.getElementById('txtbx')

btn.addEventListener('click',() => {
    const inp = document.getElementsByTagName('input')
    const name = inp[0].value
    const username = inp[1].value
    const password = inp[2].value

    fetch("cdm/SignUp.php",{
        method:"POST",
        headers:{
            "Content-Type":"application/json; charset=UTF-8"
        },
        body:JSON.stringify({
            "name":name,
            "username":username,
            "password":password
    })
    }).then((res)=>{
        return res.json()
    }).then((resp)=>{
        if(resp.sucess == 1){
            txt.innerHTML = resp.msg
            location.replace("home.html")
        }else{
            txt.innerHTML = resp.msg
        }
    })
})