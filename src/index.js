import Vue from 'vue';
import Wrapper from './Wrapper';
import camelCase from 'lodash.camelcase';
import "./components";

const Constructor = Vue.extend(Wrapper);

document.addEventListener('DOMContentLoaded', () => {
	document.querySelectorAll('[data-vue-component]').forEach((el) => {
		const data = {};

		for (let attr of el.attributes) {
			const name = camelCase(attr.name);

			try {
				data[name] = JSON.parse(attr.value);
			} catch (err) {
				data[name] = attr.value;
			}
		}

		delete data.dataVueComponent;

		const instance = new Constructor({
			propsData: {
				componentName: el.getAttribute('data-vue-component'),
				componentProps: data,
			},
		});

		instance.$mount();

		el.replaceWith(instance.$el);
	});
});