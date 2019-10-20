import Vue from 'vue';

import VueRouter from 'vue-router';

import hey from './components/hey';

Vue.use(VueRouter);

const router = new VueRouter({
	mode: 'history',
	routes: [
    	{
    		path: '/hey',
    		name: 'hey',
    		component: hey	
    	}
	]
});

export default router;