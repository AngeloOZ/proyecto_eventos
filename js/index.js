getDataClient();

function clientRegister(data){
    url = "https://roman-company.com/TrailerMovilApiRest/view/cliente.php";
    fetch(url,{
        method: 'POST',
        body: JSON.stringify(data),
        headers:{
            'Content-Type': 'application/json'
          }
    }).then(res => res.json())
    .catch(error => console.error('Error:', error))
    .then(response => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'success',
            title: 'Signed in successfully'
          }) 
    });
}

function getDataClient() {
    const  regis_form = document.getElementById("r_formulario");
    const btn_log = document.getElementById("sign-in-btn");
    if (!regis_form) return;

    regis_form.addEventListener("submit", e=> {
        e.preventDefault();
        const datos = {
            "nombre" : regis_form.r_name.value,
            "email": regis_form.r_email.value,
            "password" : regis_form.r_password.value,
            telefono:  regis_form.r_tel.value,
            direccion: "",
            foto: "",
            dni_ruc: "",
        }
        clientRegister(datos);
        regis_form.reset();
        btn_log.click();
        
    });

}

