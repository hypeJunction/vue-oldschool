<template>
    <div class="ui fluid card">
        <a
            class="image"
            :href="item.href"
        >
            <img :src="item.thumb">
        </a>

        <div class="content">
            <a
                class="header"
                :href="item.href"
            >{{ item.name }}
            </a>
        </div>

        <div class="extra content">
            <like-button
                class="left floated"
                v-model="item.likes"
            />

            <favorite-button class="right floated"/>
        </div>
    </div>
</template>

<script>
	export default {
		props: {
			item: {
				type: Object,
				required: true,
			}
		},
	}
</script>

<style scoped>

</style>