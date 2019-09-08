<template>
    <component
        :is="componentName"
        v-bind="componentProps"
    ></component>
</template>

<script>
	export default {
		inheritAttrs: false,

		props: {
			componentName: {
				type: String,
				default: 'div',
			},

			componentProps: {
				type: Object,
				default() {
					return {};
				}
			}
		},
	}
</script>