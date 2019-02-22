function reception(position) {
    var b = $('#num'+position).children('span')[0].getBoundingClientRect();
    $('#minion').css({'left': (b.left-25), 'top': (b.top-25)});
}
reception(1);
