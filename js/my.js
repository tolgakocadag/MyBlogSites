$(function(){
  $("#contact-name").keyup(function(){
    var limit =1 ; // max kaç karakter olacak
    var kalanKarakter =$("#contact-name").val().length;
    $("#contact-name").attr('maxlength',75); // text e limit değişkeni değerinden fazla yazı yazılmasın
    if(kalanKarakter <= 75){
      kalanKarakter=kalanKarakter+"/75";
      $("#kalanKarakter").html(kalanKarakter);
      kalanKarakter = limit+$("#contact-name").val().length;
    }
  });
  $("#contact-email").keyup(function(){
    var limit =1 ; // max kaç karakter olacak
    var kalanKarakter =$("#contact-email").val().length;
    $("#contact-email").attr('maxlength',125); // text e limit değişkeni değerinden fazla yazı yazılmasın
    if(kalanKarakter <= 125){
      kalanKarakter=kalanKarakter+"/125";
      $("#emailkalanKarakter").html(kalanKarakter);
      kalanKarakter = limit+$("#contact-email").val().length;
    }
  });
  $("#message").keyup(function(){
    var limit =1 ; // max kaç karakter olacak
    var kalanKarakter =$("#message").val().length;
    $("#message").attr('maxlength',150); // text e limit değişkeni değerinden fazla yazı yazılmasın
    if(kalanKarakter <= 150){
      kalanKarakter=kalanKarakter+"/150";
      $("#mesajkalanKarakter").html(kalanKarakter);
      kalanKarakter = limit+$("#message").val().length;
    }
  });
});
