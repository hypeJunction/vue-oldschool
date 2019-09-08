<template>
    <div class="ui grid">
        <div class="four wide column">
            <div class="ui card">
                <div class="image">
                    <img
                        :src="item.thumb"
                        style="max-width: 100%"
                    >
                </div>

                <div class="extra content">
                    <like-button
                        class="left floated"
                        v-model="item.likes"
                    />

                    <favorite-button class="right floated"/>
                </div>
            </div>
        </div>

        <div class="eight wide column">
            <h1 class="header">{{ item.name }}</h1>

            <div class="content">
                <p>{{ item.strInstructions }}</p>
            </div>

            <div class="ui relaxed items">
                <div
                    v-for="(ingredient, index) in ingredients"
                    class="item"
                    :key="index"
                >
                    <div class="ui tiny image">
                        <img :src="ingredient.thumb">
                    </div>
                    <div class="middle aligned content">
                        <div class="header">{{ ingredient.name }}</div>
                        <div class="meta">{{ ingredient.measure }}</div>
                    </div>
                </div>
            </div>
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

		computed: {
			ingredients() {
				const ingredients = [];

				for (let i = 0; i <= 15; i++) {
					const name = this.item[`strIngredient${i}`];

					if (name) {
						ingredients.push({
							thumb: `https://www.thecocktaildb.com/images/ingredients/${name}.png`,
							name,
							measure: this.item[`strMeasure${i}`],
						});
					}
				}

				return ingredients;
			}
		}
	}
</script>

<style scoped>

</style>