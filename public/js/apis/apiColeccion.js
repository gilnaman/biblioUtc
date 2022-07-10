var ruta = document.querySelector("[name=route]").value;

var colecciones= ruta + '/api/rutaPendiente';



new Vue ({

	//Pasa automáticamente la petición
	http: {
		headers: {
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	el:"#coleccion",

	data:{
		colecciones:[],
		

		id_coleccion:'',
		nombre:'',


		agregando:true,
		buscar:'',
	},

	created: function() {
		this.obtenerColecciones();
	},

	methods:{

		obtenerColecciones: function(){
			this.$http.get(colecciones).then(function(json){
				this.colecciones=json.data;
				console.log(json.data);
			}).catch(function(json){
				console.log(json);
			});
		},

		mostrarModal: function(){
			this.agregando=true,
			this.id_coleccion='';
			this.nombre='';


			$('#modalColeccion').modal('show');
		},


		guardarColeccion: function(){
			var c={
				id_coleccion:this.id_coleccion,
				nombre:this.nombre

			};

			this.$http.post(colecciones,c).then(function(json){
				this.obtenerColecciones();
				this.id_coleccion='';
				this.nombre='';

				

			}).catch(function(json){
				console.log(json);
			});

			$('#modalColeccion').modal('hide');
			console.log(p);
		},


		eliminarColeccion: function(id){
			var confir= confirm('¿Está seguro de eliminar esta Coleccion?');

			if (confir)
			{
				this.$http.delete(colecciones + '/' + id).then(function(json){
					this.obtenerColecciones();
				}).catch(function(json){

				});
			}
		},


		editandoColeccion: function(id){
			this.agregando=false,
			this.id_coleccion=id;

			this.$http.get(colecciones + '/' + id).then(function(json){

				this.id_coleccion=json.data.id_coleccion;
				this.nombre=json.data.nombre
	;
			});

			$('#modalColeccion').modal('show');
		},


		actualizarColeccion: function(){

			var jsonColeccion = {
								   id_coleccion:this.id_coleccion,
				                   nombre:this.nombre

				                   

							  };

			this.$http.patch(colecciones + '/' + this.id_coleccion,jsonColeccion).then(function(json){
				this.obtenerColecciones();
			});

			$('#modalColeccion').modal('hide');						
		},







	},
	//FIN DE METHODS

	computed:{

		filtroColecciones: function(){
			return this.colecciones.filter((c)=>{
				return c.nombre.toLowerCase().match(this.buscar.toLowerCase().trim())
			});
		},
	}
});