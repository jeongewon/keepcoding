$('#cate1').on('change',function(){
  makeOption($(this),2,'중분류', $('#cate2'));
}); //cate1 change

$('#cate2').on('change',function(){
  makeOption($(this),3, '소분류', $('#cate3'));
}); //cate2 change

$('#pcode2_1').on('change',function(){
  makeOption($(this),2,'중분류', $('#pcode3'));
}); //Modal3 select change


function makeOption(evt, step, category, target){
  let cate = evt.val();
  console.log(cate);

  let data = { 
    cate : cate,  //부모 분류의 cid
    step: step,
    category: category
  }

  $.ajax({
    async : false, //sucess의 결과 나오면 이후 작업 수행
    type: 'post', //변수명cate1의 값을 전달할 방식 post      
    data: data, //data객체의 값을 data property 할당
    url: "printOption.php", 
    dataType: 'html', //success성공후 printOption.php가 반환하는 데이터의 형식  <option></option>
    success: function(result){
      console.log(result);
      target.html(result);
    }
  });//ajax
}