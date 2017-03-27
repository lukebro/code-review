require('./bootstrap');

Vue.component('checkpointCreator', require('./components/CheckpointCreator.vue'));
Vue.component('modal', require('./components/Modal.vue'));

window.Event = new Vue({});

const app = new Vue({
    el: '#app',

    mounted() {
    	this.$on('modal', name => {
    		Event.$emit('modal', name);
    	});
    }
});

$('.flash').delay(3000).slideUp(500);

$('.flash.delete').click(function () {
	$(this).parent().slideUp(500);

    return false;
});
