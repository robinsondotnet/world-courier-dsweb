$.fn.api.settings.api = {
  'get clientes'  : '/clientes/json'

};

$("#ClienteID").dropdown({
    fullTextSearch: true,
    saveRemoteData:false,
    debug: true,
    fields: { name: "Nombre", value: "ClienteID"},
    apiSettings:{
        url: '/clientes/json',
        cache: false,
        onResponse: function(rawResponse) {
        var response = {
            results : []
          };

        $.each(rawResponse, function(index, item) {

          response.results.push({
            Nombre       : item.Nombre + " " + item.Apellido_paterno + " " + item.Apellido_materno,
            ClienteID : item.ClienteID
          });

        });

        return response;
      },
    },
    localSearch: false
    
});


$("#EmpleadoID").dropdown({
    fullTextSearch: true,
    saveRemoteData:false,
    debug: true,
    fields: { name: "Nombre", value: "EmpleadoID"},
    apiSettings:{
        url: '/empleados/json',
        cache: false,
        onResponse: function(rawResponse) {
        var response = {
            results : []
          };

        $.each(rawResponse, function(index, item) {

          response.results.push({
            Nombre       : item.Nombre + " " + item.Apellido,
            EmpleadoID : item.EmpleadoID
          });

        });

        return response;
      },
    },
    localSearch: false
    
});
