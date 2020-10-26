(function() {
'use strict';

var cmds = document.getElementsByClassName('del');
var i;

for (i = 0; i < cmds.length; i++) {
cmds[i].addEventListener('click', function(e) {
  e.preventDefault();
  if (confirm('タスクを削除しますがよろしいですか？')) {
    document.getElementById('form_' + this.dataset.id).submit();
  }
});
}

})();


$(":checkbox").click(function() {
  console.log("aaaa");

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


$(":checkbox").click(function() {

  var json1 = $(this).val();
  console.log($(this).val());

  var taskId = $(this).attr('id');

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






