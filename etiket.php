<?php include "includes/_Header.php"; ?>
<div class="row">
  <div class="col-2">

  </div>
  <div class="col-1">
    <label>TEXT:</label>
  </div>
  <div class="col-6">
    <input type="text" id='girdi' onchange="calistir()" class="form-control" />
  </div>
</div>
<script>
function calistir(){
    var cik=document.getElementById('girdi').value;
    var cikti=cik+',';
    cikti+=cik+' full izle,';
    cikti+=cik+' full indir,';
    cikti+=cik+' türkçe dublaj izle,';
    cikti+=cik+' türkçe altyazılı izle,';
    cikti+=cik+' ingilizce altyazılı izle';
    document.getElementById('cikti').innerHTML=cikti;
}
</script>
&emsp;
<label id='cikti'></label>
<?php include "includes/_Footer.php"; ?>
