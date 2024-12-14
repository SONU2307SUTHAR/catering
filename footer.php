</section>
    <footer>
      this is footer
    </footer>
 </div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<script>
  $(document).ready(function(){         //shorting krne k liye accending oe desending code
    var oTable = $('#list').dataTable( {
    "aoColumnDefs": [
        { "bSortable": false, 
          "aTargets": [ 0, 1] }, 
        
        ]
    }); 
  })
  function checkdel(allobj){ //item ko all checked(select) krne k liye code
    let all=document.querySelectorAll('.delc');
    for(let i=0;i<all.length;i++){
      all[i].checked=allobj.checked;
    }
    ditem.style.display=allobj.checked?"":'none';
  }

  function displaybtn(){ //item checked hone pr delete btn show hoga
    let alls=document.querySelectorAll('.delc');
    counter=0;
    for(let i=0;i<alls.length;i++){
      if(alls[i].checked){
        counter++;
        
      }
    }
   
    ditem.style.display=counter ?"":'none';
    if(counter==alls.length){
      all.checked=true;
    }else{
      all.checked=false;
    }

  }
</script>
</body>
</html>