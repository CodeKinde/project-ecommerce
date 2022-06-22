$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
    var link = $(this).attr("href");
        Swal.fire({
          title: 'Êtes-vous sûr?',
          text: "Vous ne pourrez pas revenir en arrière!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Oui, supprimer le!'
    }).then((result) => {
      if (result.isConfirmed) {
          window.location.href = link
        Swal.fire(
          'Supprimer!',
          'Votre fichier a été supprimé.',
          'success'
        )
      }
    })
    })

//confirm alert
$(document).on('click','#confirm',function(e){
    e.preventDefault();
var link = $(this).attr("href");
    Swal.fire({
      title: 'Êtes-vous sûr de confirmé?',
      text: "Une fois confirmé vous ne pourrez plus être en attente!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Oui, confirmé le!'
}).then((result) => {
  if (result.isConfirmed) {
      window.location.href = link
    Swal.fire(
      'Confirmé!',
      'Votre commande a été confirmé.',
      'success'
    )
  }
})
})

//processing alert
$(document).on('click','#processing',function(e){
    e.preventDefault();
var link = $(this).attr("href");
    Swal.fire({
      title: 'Êtes-vous sûr de traité?',
      text: "Une fois Traité vous ne pourrez plus être confirmé!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Oui, Traité le!'
}).then((result) => {
  if (result.isConfirmed) {
      window.location.href = link
    Swal.fire(
      'Traité!',
      'Votre commande a été Traité.',
      'success'
    )
  }
})
})
//picked alert
$(document).on('click','#picked',function(e){
    e.preventDefault();
var link = $(this).attr("href");
    Swal.fire({
      title: 'Êtes-vous sûr de choisie?',
      text: "Une fois choisie vous ne pourrez plus être traité!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Oui, Choisie le!'
}).then((result) => {
  if (result.isConfirmed) {
      window.location.href = link
    Swal.fire(
      'Choisie!',
      'Votre commande a été choisie.',
      'success'
    )
  }
})
})

//shipped alert
$(document).on('click','#shipped',function(e){
    e.preventDefault();
var link = $(this).attr("href");
    Swal.fire({
      title: 'Êtes-vous sûr de envoyé?',
      text: "Une fois envoyé vous ne pourrez plus être choisie!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Oui, Envoyé le!'
}).then((result) => {
  if (result.isConfirmed) {
      window.location.href = link
    Swal.fire(
      'Envoyé!',
      'Votre commande a été envoyé.',
      'success'
    )
  }
})
})


//delivered alert
$(document).on('click','#delivered',function(e){
    e.preventDefault();
var link = $(this).attr("href");
    Swal.fire({
      title: 'Êtes-vous sûr de Livré?',
      text: "Une fois livré vous ne pourrez plus être envoyé!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Oui, Livré le!'
}).then((result) => {
  if (result.isConfirmed) {
      window.location.href = link
    Swal.fire(
      'Livré!',
      'commande a été livré.',
      'success'
    )
  }
})
})

  });
