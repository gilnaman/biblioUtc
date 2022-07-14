var ruta = document.querySelector("[name=route]").value;

new Vue({
    el: "#pais",
    
    http: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },

    data: {
        paises: [],
        nombre_pais: '',
        agregando: false,
        buscar: '',
        id_pais:0,
        error:0,
        arrayError:[],
        modal:0, 
    },

    // Al crearse la pagina 
    created: function() {
        this.obtenerPaises();
 
    },

    // INICIO DE METHODS
    methods: {
        obtenerPaises: function() {
            var url='getPaises';
            this.$http.get(url).then(function(json) {
                this.paises = json.data;
            }).catch(function(json) {
                console.log(json);
            });
        },

        cerrarModal(){
            this.id_pais=0
            this.nombre_pais=""
            $("#modalPais").modal('hide');

        },

        mostrarModal: function() {
            this.agregando = true;
            this.id_pais=0;
            this.nombre_pais = '';

            $('#modalPais').modal('show');
        },

        validarInputs(){

            this.error=0;
            this.arrayError=[];

            if (!this.nombre_pais) this.arrayError.push('El nombre es requerido');
            if (this.nombre_pais.length > 60) this.arrayError.push('El nombre tiene un limite de 60 letras');

            
            //compruebo si el mensaje tiene algun error para convertir a la variabe  en 1
            if(this.arrayError.length) this.error=1;
                //retorno el rror 
            return this.error;
            
        },

        guardarPais(){
         //validacion de inputs
           if(this.validarInputs()){

                return;                
           }

        },

      
        editarPais: function(data=[]) {
            //VALIDACION DE ESTADO DEL MODAL
            this.agregando = false;
            //CAPTURA LA ID DEL DATA ID PAIS
            this.id_pais=data['id_pais'];
            //CAPTURA EL NOMBRE DEL DATA NOMBRE PAIS
            this.nombre_pais=data['nombre_pais'];
            //MOSTRA EL MODAL A TRAVEZ DE JQUERY
            $("#modalPais").modal('show');
             //$("#modalPais").modal('hide');

            console.log(this.nombre_pais);
                
        },

        actualizarPais: function(){
               //validacion de inputs
               if(this.validarInputs()){

                    return;                
               }
               var url='update/pais';
                //creo un array que contendra los datos
        	    let PaisUpdate = {
        		    'nombre_pais':this.nombre_pais,
                    'id_pais':this.id_pais
        	    };


                this.$http.put(url, PaisUpdate).then(function(){
                    //dejo vacio los campos
                    this.id_pais=0;
                    this.nombre_pais="";
                    //oculto el modal
                    $('#modalPais').modal('hide');
                    //refreco la tabla metodo index
                    this.obtenerPaises();
                });
        

        },



    },

    computed: {

        filtroPaises: function() {
            return this.paises.filter((pais) => {
                return pais.nombre_pais.toLowerCase().match(this.buscar.toLowerCase().trim())
            });

        }
    }

});
// FIN DE METHODS