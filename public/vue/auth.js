//Obtener el host dinamicamente
var host = window.location.hostname;

//Validar si se esta usando el servidor de laravel para agregar el puerto
if (host == '127.0.0.1') {
    host = host + ":8000";
}

//Crear la ruta final con el prefijo api
var url = "http://" + host + "/api";


new Vue({
    el: '#auth',

    data: {
        //Verifica que si se recupero el usuario
        matriculaVerificada: false,
        //lista de actividades
        actividades: [],
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

    created() {
        this.cargarAcciones();
    },

    methods: {
        mostrarAlertas: function (header, mensaje, icono) {
            Swal.fire(
                header,
                mensaje,
                icono
            );
        },

        cargarAcciones: function () {
            this.$http.get(url + '/lista-acciones').then(function (json) {
                this.actividades = json.data;
            }).catch(function (json) {
                console.log(json);
            });
        },

        validarMatricula: function () {
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

            this.$http.post(url + '/confirmar-matricula', this.data).then(function (json) {
                //Validar si existe un usuario
                if (json.data.error == true) {
                    //Si la validacion es correcta es que no existe la matricula
                    this.mostrarAlertas(
                        'No existe',
                        'El usuario proporcionado no existe',
                        'error'
                    )
                    //Cancelar el proceso
                    return;
                }

                //Asignar una bandera para validar el usuario
                this.matriculaVerificada = true;
                this.nombreUser = json.data.nombre;

                //El usuario si existe mostrar la modal
                $("#modalAccion").modal('show');

            }).catch(function (json) {
                //Si la peticion falla mostrar los errores
                console.log(json);
            });
        },

        mandarRespuesta: function () {
            //Validar que el usuario exista
            if (this.matriculaVerificada == false) {
                this.mostrarAlertas(
                    'Operación invalida',
                    'si el problema persiste refresque la pagina',
                    'error'
                )
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
            if (this.data.actividad == -1) {
                //Si se encuentra agregar el error al objecto
                this.erroresValidacion = {
                    'actividad': 'Seleccione una opción valida',
                };

                //Regresar un true
                return true;
            }
            return false;
        },

        resetUI: function () {
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

        crearRegistro: function () {
            //variable para crear una llave
            $respuesta = false;

            //Mandar la peticion al servidor
            this.$http.post(url + '/registrar-acceso', this.data).then(function (json) {
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

            }).catch(function (json) {
                this.mostrarAlertas(
                    'Ocurrio un error',
                    'Consulte la consola para conocer los detalles',
                    'error'
                )
                console.log(json);
            })
        },
    },
})