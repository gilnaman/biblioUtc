var urlBase = "http://127.0.0.1:8000"
var url = urlBase + "/api"

//window.location.replace(url);

new Vue({
    el: '#auth',

    data: {
        //Verifica que si se recupero el usuario
        matriculaVerificada: false,
        //Nombre que se va mostrar
        nombreUser: '',
        //Json que se va mandar
        data: {
            matricula: '',
            //-1 si es por defecto
            actividad: -1,
        },
        //Errores de validacion
        erroresValidacion: {
            actividad: null,
            matricula: null,
        },
        banner: -1, //Si es -1 no existe, si es 0 es error y si es 1 es correcto
    },

    methods: {
        validarMatricula: function() {
            //Esconder la alerta si esta visible
            this.banner = -1;
            //Validar que el campo no este vacio
            this.erroresValidacion.matricula = null;

            if (this.data.matricula === '') {
                //Crear el campo matricula en el objecto
                this.erroresValidacion = {
                    matricula: 'El campo no puede estar vacio',
                };
                return;
            }

            this.$http.post(url + '/confirmar-password', this.data).then(function(json) {
                //Validar si existe un usuario
                if (json.data.error == true) {
                    //Si la validacion es correcta es que no existe la matricula
                    alert('El usuario no es valido');
                    //Cancelar el proceso
                    return;
                }

                //Asignar una bandera para validar el usuario
                this.matriculaVerificada = true;
                this.nombreUser = json.data.nombre;

                //El usuario si existe mostrar la modal
                $("#modalAccion").modal('show');
                
            }).catch(function(json) {
                //Si la peticion falla mostrar los errores
                console.log(json);
            });
        },

        mandarRespuesta: function() {
            //Validar que el usuario exista
            if (this.matriculaVerificada == false) {
                alert('Acción no valida refresque la pagina');
                return;
            }

            //Si es true existen errores de validación
            if (this.validaciones() == true) {
                //Cancelar la operacion
                return;
            }

            //mandar un post al servidor para almacenar los datos
            this.crearRegistro();


            //alert('correcto');
        },
        
        validaciones: function () {
            this.erroresValidacion = {
                actividad: null,
                matricula: null,
            };
            //Validar que la actividad no sea la que esta por defecto
            if(this.data.actividad == -1) {
                //Si se encuentra agregar el error al objecto
                this.erroresValidacion = {
                    'actividad': 'Seleccione una opción valida',
                };
                
                //Regresar un true
                return true;
            }
            return false;
        },

        resetUI: function() {
            //Resetear las variables iniciales
            this.erroresValidacion = {
                actividad: null,
                matricula: null,
            };
            this.matriculaVerificada = false;
            this.data.matricula = '';
            this.data.actividad = -1;
            this.banner = -1;
        },

        crearRegistro: function() {
            //variable para crear una llave
            $respuesta = false;

            //Mandar la peticion al servidor
            this.$http.post(url + '/registrar-acceso', this.data).then(function(json) {
                //Validar que la respuesta sea correcta
                if (json.data.respuesta == true) {
                    //redireccionar a la vista seleccionada
                    this.resetUI();
                    this.banner = 1;
                } else {
                    console.log(json.data);
                    //La respuesta no es valida
                    this.banner = 0;
                }

                $("#modalAccion").modal('hide');
                
            }).catch(function(json) {
                console.log(json);
            })
        },
    },
})