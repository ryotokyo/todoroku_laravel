(function() {

//is_completedが1の場合は、完了済みで表示する

// $(".todoTable__check").on("load", function(){
//
//   var checkedId = $(this).attr('id')
//   var finishFlag = $(this).val();
//   console.log(checkedId);

  // if($(".todoTable__check").prop('checked')){
  //   $(".todoTable__check").closest("tr").css("text-decoration", "line-through");
  // };

// });

// $(function(){
// var checkedId = $("#{{$task->id}}").attr('id')
// var finishFlag = $("#{{$task->id}}").val();
// console.log(checkedId);
// console.log(finishFlag);
//
// if(finishFlag === "1" ){
//   $("#{{$task->id}}").prop("checked", true);
//   $("#{{$task->id}}").closest("tr").css("text-decoration", "line-through");
// };
// });

//チェックすると、完了なら取り消し線を引く

$(":checkbox").click(function() {

  if ($(this).is(":checked"))
  {
    $(this).closest("tr").css("text-decoration", "line-through");
    $(this).val('1');

  }
  else {
    $(this).closest("tr").css("text-decoration", "none");
    $(this).val('0');
  }
});


//チェックすると、valueをpostする

$(":checkbox").click(function() {

  var json1 = $(this).val();
  console.log($(this).val());

  var taskId = $(this).attr('id');
  console.log($(this).attr('id'));

  $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
    		url:'/complete/' + taskId,
    		type:"post",
    		contentType: "application/json",
    		data:JSON.stringify(json1),
    		dataType:"json",
    		}).done(function (results){
            // 成功したときのコールバック
        }).fail(function(jqXHR, textStatus, errorThrown){
            // 失敗したときのコールバック
        }).always(function() {
            // 成否に関わらず実行されるコールバック
    		});

});


//削除時のポップアップ確認


'use strict';

// var cmds = document.getElementsByClassName('del');
// var cmds = $('.del');
// var i;

// for (i = 0; i < cmds.length; i++) {
// cmds[i].addEventListener('click', function(e) {
//   e.preventDefault();
//   if (confirm('タスクを削除しますがよろしいですか？')) {
//     document.getElementById('form_' + this.dataset.id).submit();
//   }
// });
// }

$('.del').each(function(i, delTask){
  $(delTask).on('click', function(e) {
    // e.preventDefault();
    // console.log(delTask);
    // console.log(`form_${$(delTask).data('id')}`);
    if (confirm('タスクを削除しますがよろしいですか？')) {
      $(`#form_${$(delTask).data('id')}`).submit();
    }
  });
})



// $(document).ready(function(e){
// var ary = $('.aaaa');
// var taskId = ary[i].data();
// console.log(ary);
$('.aaaa').each(function(index, input){
  var taskId = $(input).data('id');
  var doneId = $(input).data('completed');
  // console.log(input);

  if(doneId === 1 ){
    $('#' + taskId).prop("checked", true);
    $('#' + taskId).closest("tr").css("text-decoration", "line-through");
    };
})
// for (i = 0; i < ary.length; i++) {
//   // var temp = ary[i].getAttribute('data-id');
//   var taskId = ary[i].dataset.id;
//   var doneId = ary[i].dataset.completed;

  // var hoge = $("#29").data();
  // console.log(hoge);

  // var doneid = $('.aaaa').data('id');
  // console.log($(ary[i]).data('id'));
  // console.log(taskId);
  // console.log(doneId);
  // console.log("#taskId");

  // if(doneId === "1" ){
  //   $('#' + taskId).prop("checked", true);
  //   $('#' + taskId).closest("tr").css("text-decoration", "line-through");
  // };
// }
// });


// var taskId = ary[i].id;

// var ary = $('.aaaa').data();
// console.log(ary);
// for (i = 0; i < ary.length; i++) {
//   // var temp = ary[i].data('data-id');
//   // var doneid = $('.aaaa').data('id');
//   console.log(ary[i]);
//   // console.log(doneid);
// }


// var doneid = $('#29').data();
// console.log(doneid);

})();


