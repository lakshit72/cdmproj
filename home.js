window.onload = () => {
    const MainDiv = document.getElementById('rowdiv')
    var arr = {}

    fetch("cdm/Data.php",{
        method:"GET"
    }).then((res)=>{
        return res.json()
    }).then((resp)=>{
        if(resp.sucess == 1){

            arr = resp.data
            arr.forEach(el => {
                console.log(el.slice(3).concat('.jpg'))
                var x = document.createElement("IMG");
                x.setAttribute('src',el.slice(3).concat('.jpg'))
                x.setAttribute('alt',"")
                var prod = document.createElement('DIV')
                prod.classList.add('product')
                prod.appendChild(x)
                
                var divBig = document.createElement('DIV')
                divBig.classList.add('col-lg-3','col-sm-6','d-flex','flex-column','align-items-center','justify-content-center','product-item','my-3')
                divBig.appendChild(prod)
                MainDiv.appendChild(divBig)
            })
        }             
        })
    
}

const btn = document.getElementById('btn')

btn.addEventListener('click',() => {
    const inpfile = document.getElementById('infile')
    const formData = new FormData()
    
    formData.append('file',inpfile.files[0])

    fetch("cdm/ImgIns.php",{
        method:"POST",
        body:formData
    }).catch((e)=>{
        console.log(e)
    }).then((res)=>{
        return res.json()
    }).then((resp)=>{
        if(resp.sucess == 1){
            location.reload()
        }
    })
})