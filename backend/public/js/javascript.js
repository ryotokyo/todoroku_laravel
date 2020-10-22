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

  if ($(this).is(":checked"))
  {
    $(this).closest("tr").css("text-decoration", "line-through");
  }
  else {
    $(this).closest("tr").css("text-decoration", "none");
  }

});






