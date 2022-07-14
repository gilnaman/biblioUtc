var ruta = document.querySelector("[name=route]").value;

var apiColeccion=ruta + '/api/apiColeccion';


new Vue({

	http: {
      headers: {
        'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
      }
    },


	el:"#coleccion",

	data:{
		colecciones:[],
		nombre:'',
		agregando:true,
		id_coleccion: '',
		buscar:'',
		

	},

	//AL CREARSE LA PAGINA
	created:function(){
		this.obtenerColecciones();
	;
		

			},

	methods:{
		obtenerColecciones:function (){
			this.$http.get(apiColeccion).then(function(json){
				this.colecciones=json.data;
				console.log(json.data);
			}).catch(function(json){
				console.log(json);
			})
		},
	

		mostrarModal:function(){
			this.agregando=true;
			this.nombre='';
			

			$('#modalColeccion').modal('show');
		},

		guardarColeccion:function(){

			// se construye el json para enviar al controlador
			var coleccion={nombre:this.nombre
				
			};

			//se envia los datos del json al controlador
			this.$http.post(apiColeccion,coleccion).then(function(j){
				this.obtenerColecciones();
				this.nombre='';
			
			
		

			}).catch(function(j){
				console.log(j);
			});


			$('#modalColeccion').modal('hide');

			console.log(coleccion);



		},

			//funcion para eliminar
		eliminarColeccion:function(id){
			var confir= confirm('¿Esta seguro de eliminar la colección?');

			if (confir)
			{
				this.$http.delete(apiColeccion + '/' + id).then(function(json){
					this.obtenerColecciones();
				}).catch(function(json){

				});
			}
		},


		editandoColeccion:function(id){
			this.agregando=false;
			this.id_coleccion=id;

			this.$http.get(apiColeccion + '/' + id).then(function(json){
				this.nombre = json.data.data.nombre;

			});

			$('#modalColeccion').modal('show');

		},

		actualizarColeccion:function(){
			
			var jsonColeccion = {nombre:this.nombre	};

			this.$http.patch(apiColeccion + '/' + this.id_coleccion,jsonColeccion).then(function(json){
				this.obtenerColecciones();

			});

			$('#modalColeccion').modal('hide');
		},


	},
	//FIN DE MITHODS

	//inicio de reaccion automatica
	computed: {
			//filtrar a los autores
		filtroColecciones: function () {
			return this.colecciones.filter((coleccion) => {
				return coleccion.nombre.toLowerCase().match(this.buscar.toLowerCase().trim())
			});
		}


	}
	//fin computed

});
