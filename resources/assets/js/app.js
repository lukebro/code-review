require('./bootstrap');

Vue.component('checkpointCreator', require('./components/CheckpointCreator.vue'));

const app = new Vue({
    el: '#app'
});

$('.flash').delay(3000).slideUp(500);

$('.flash.delete').click(function () {
	$(this).parent().slideUp(500);

    return false;
});
