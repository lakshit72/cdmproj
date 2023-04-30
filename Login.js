const btn = document.getElementById("login")
const err = document.getElementById('err')

btn.addEventListener('click',() => {
    const inptag = document.getElementsByTagName("input")
    const username = inptag[0].value
    const password = inptag[1].value
    console.log(username)
    console.log(password)
    fetch("cdm/LogIn.php",{
        method:"POST",
        headers:{
            "Content-Type":"application/json; charset=UTF-8"
        },
        body:JSON.stringify({"username":username,
        "password":password})
    }).then((res) => {
        return res.json()
    }).then((rep) => {
        if(rep.Sucess == 1){
            err.innerHTML = rep.msg
            location.replace("home.html")
        }else{

            err.innerHTML = rep.msg
        }
    })
})