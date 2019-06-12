var databaseLength = 100;

window.onload = function()
{
  setInterval("refreshDatabase()", 3000);
};

function refreshDatabase()
{
  $.ajax({
    method: 'GET',
    url: 'queryDatabase',
    data: { data: databaseLength },

    success: function( response )
    {
      databaseLength = response.data;

      if( response.status )
      {
          document.location = 'http://localhost:8887/alarma/public/home/view/alert';
      }

    }
  });
}
