<?php 
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\PreparationStep;

class RecipesTableSeeder extends Seeder
{
    public function run()
    {
        $recipes = [
            [
                'id' => 1,
                'recipeTitle' => 'Classic Beef Burger',
                'description' => 'A juicy beef burger with cheese, lettuce, and tomato.',
                'category_id' => 1,
                'picture' => 'imagesRecepies/Normal/classic_beef_burger.jpg',
                'ingredients' => [
                    '500g ground beef',
                    '1 egg',
                    '1/2 cup breadcrumbs',
                    '4 slices cheese',
                    '4 hamburger buns',
                    'Lettuce',
                    'Tomato',
                    'Salt and pepper'
                ],
                'preparationSteps' => [
                    'In a large bowl, mix the ground beef, beaten egg, breadcrumbs, salt, and pepper.',
                    'Form the mixture into patties.',
                    'Preheat a grill to medium-high heat.',
                    'Grill the patties for about 5-7 minutes on each side, until fully cooked.',
                    'Place a slice of cheese on each patty during the last minute of grilling.',
                    'Toast the hamburger buns on the grill.',
                    'Assemble the burgers with lettuce, tomato, and the beef patty.',
                    'Serve immediately.'
                ]
            ],
            [
                'id' => 2,
                'recipeTitle' => 'Chicken Caesar Salad',
                'description' => 'A classic salad with grilled chicken, romaine lettuce, croutons, and Caesar dressing.',
                'category_id' => 4,
                'picture' => 'imagesRecepies/Normal/chicken_caesar_salad.jpg',
                'ingredients' => [
                    '2 chicken breasts',
                    '1 head of romaine lettuce',
                    '1/2 cup Caesar dressing',
                    '1/4 cup grated Parmesan cheese',
                    '1 cup croutons',
                    'Salt and pepper'
                ],
                'preparationSteps' => [
                    'Season the chicken breasts with salt and pepper.',
                    'Grill the chicken until fully cooked and then slice it.',
                    'Chop the romaine lettuce and place it in a large salad bowl.',
                    'Add the grilled chicken slices, Caesar dressing, grated Parmesan cheese, and croutons.',
                    'Toss the salad to combine all the ingredients.',
                    'Serve immediately.'
                ]
            ],
            [
                'id' => 3,
                'recipeTitle' => 'Spaghetti Carbonara',
                'description' => 'A classic Italian pasta dish with eggs, cheese, pancetta, and pepper.',
                'category_id' => 1,
                'picture' => 'imagesRecepies/Normal/spaghetti_carbonara.jpg',
                'ingredients' => [
                    '400g spaghetti',
                    '150g pancetta',
                    '2 large eggs',
                    '100g grated Parmesan cheese',
                    '2 cloves garlic',
                    'Salt and pepper'
                ],
                'preparationSteps' => [
                    'Cook the spaghetti according to package instructions.',
                    'In a separate pan, cook the pancetta until crispy.',
                    'Beat the eggs in a bowl and add the grated Parmesan cheese.',
                    'Drain the spaghetti and add it to the pan with the pancetta.',
                    'Remove the pan from heat and quickly mix in the egg and cheese mixture.',
                    'Add minced garlic, salt, and pepper to taste.',
                    'Serve immediately.'
                ]
            ],
            [
                'id' => 4,
                'recipeTitle' => 'Vegetable Stir-Fry',
                'description' => 'A quick and healthy stir-fry with mixed vegetables and a savory sauce.',
                'category_id' => 1,
                'picture' => 'imagesRecepies/Normal/vegetable_stir_fry.jpg',
                'ingredients' => [
                    '1 bell pepper',
                    '1 carrot',
                    '1 broccoli',
                    '100g snap peas',
                    '2 tbsp soy sauce',
                    '1 tbsp olive oil',
                    '2 cloves garlic',
                    '1 tsp ginger',
                    'Salt and pepper'
                ],
                'preparationSteps' => [
                    'Chop all the vegetables into bite-sized pieces.',
                    'Heat the olive oil in a large pan or wok over medium-high heat.',
                    'Add the garlic and ginger and stir-fry for about 1 minute.',
                    'Add the chopped vegetables and stir-fry until they are tender but still crisp.',
                    'Add the soy sauce, salt, and pepper to taste.',
                    'Serve immediately.'
                ]
            ],
            [
                'id' => 5,
                'recipeTitle' => 'Chocolate Chip Cookies',
                'description' => 'Classic chocolate chip cookies that are crispy on the outside and chewy on the inside.',
                'category_id' => 7,
                'picture' => 'imagesRecepies/Normal/chocolate_chip_cookies.jpg',
                'ingredients' => [
                    '2 1/4 cups all-purpose flour',
                    '1/2 tsp baking soda',
                    '1 cup unsalted butter, room temperature',
                    '1/2 cup granulated sugar',
                    '1 cup packed light-brown sugar',
                    '1 tsp salt',
                    '2 tsp pure vanilla extract',
                    '2 large eggs',
                    '2 cups semisweet and/or milk chocolate chips'
                ],
                'preparationSteps' => [
                    'Preheat the oven to 350°F (175°C).',
                    'In a small bowl, whisk together the flour and baking soda.',
                    'In a large bowl, combine the butter, granulated sugar, and brown sugar.',
                    'Add the salt, vanilla extract, and eggs, one at a time, mixing well after each addition.',
                    'Gradually add the flour mixture, mixing until just combined.',
                    'Stir in the chocolate chips.',
                    'Drop dough by rounded tablespoons onto baking sheets.',
                    'Bake until cookies are golden around the edges but still soft in the center, about 10-12 minutes.',
                    'Let cool on baking sheets for 2 minutes before transferring to wire racks to cool completely.'
                ]
            ],
            [
                    'id' => 6,
                    'recipeTitle' => 'Mushroom Risotto',
                    'description' => 'A creamy risotto with sautéed mushrooms and Parmesan cheese.',
                    'category_id' => 1,
                    'picture' => 'imagesRecepies/Normal/mushroom_risotto.jpg',
                    'ingredients' => [
                        '1 cup Arborio rice',
                        '2 cups chicken broth',
                        '1 cup white wine',
                        '200g mushrooms, sliced',
                        '1 onion, chopped',
                        '2 cloves garlic, minced',
                        '1/2 cup grated Parmesan cheese',
                        '2 tbsp olive oil',
                        'Salt and pepper'
                    ],
                    'preparationSteps' => [
                        'Heat the olive oil in a large pan over medium heat.',
                        'Add the chopped onion and garlic, and sauté until translucent.',
                        'Add the sliced mushrooms and cook until they release their moisture and start to brown.',
                        'Add the Arborio rice and stir to coat with the oil and mushrooms.',
                        'Pour in the white wine and cook until it is mostly absorbed by the rice.',
                        'Gradually add the chicken broth, one cup at a time, stirring frequently until the rice is creamy and tender.',
                        'Stir in the grated Parmesan cheese and season with salt and pepper.',
                        'Serve immediately.'
                    ]
            ],
            [
                    'id' => 7,
                    'recipeTitle' => 'Grilled Salmon with Lemon Butter',
                    'description' => 'A simple and delicious grilled salmon with a lemon butter sauce.',
                    'category_id' => 1,
                    'picture' => 'imagesRecepies/Normal/grilled_salmon_lemon_butter.jpg',
                    'ingredients' => [
                        '4 salmon fillets',
                        '1 lemon, sliced',
                        '4 tbsp unsalted butter',
                        '2 cloves garlic, minced',
                        'Salt and pepper',
                        '2 tbsp fresh parsley, chopped'
                    ],
                    'preparationSteps' => [
                        'Preheat the grill to medium-high heat.',
                        'Season the salmon fillets with salt and pepper.',
                        'Grill the salmon fillets for about 4-5 minutes on each side, until fully cooked.',
                        'In a small saucepan, melt the butter over medium heat.',
                        'Add the minced garlic and cook until fragrant.',
                        'Stir in the lemon slices and fresh parsley.',
                        'Pour the lemon butter sauce over the grilled salmon fillets.',
                        'Serve immediately.'
                    ]
            ],
            [
                    'id' => 8,
                    'recipeTitle' => 'Stuffed Bell Peppers',
                    'description' => 'Bell peppers stuffed with a mixture of ground beef, rice, and tomato sauce.',
                    'category_id' => 1,
                    'picture' => 'imagesRecepies/Normal/stuffed_bell_peppers.jpg',
                    'ingredients' => [
                        '4 bell peppers',
                        '500g ground beef',
                        '1 cup cooked rice',
                        '1 can tomato sauce',
                        '1 onion, chopped',
                        '2 cloves garlic, minced',
                        '1 cup shredded cheese',
                        'Salt and pepper',
                        '1 tsp Italian seasoning'
                    ],
                    'preparationSteps' => [
                        'Preheat the oven to 375°F (190°C).',
                        'Cut the tops off the bell peppers and remove the seeds and membranes.',
                        'In a large pan, cook the ground beef, chopped onion, and minced garlic until the beef is browned.',
                        'Stir in the cooked rice, tomato sauce, salt, pepper, and Italian seasoning.',
                        'Stuff the bell peppers with the beef and rice mixture.',
                        'Place the stuffed bell peppers in a baking dish and top with shredded cheese.',
                        'Cover the dish with aluminum foil and bake for 25-30 minutes.',
                        'Remove the foil and bake for an additional 10 minutes until the cheese is melted and bubbly.',
                        'Serve immediately.'
                    ]
            ],
            [
                    'id' => 9,
                    'recipeTitle' => 'Blueberry Pancakes',
                    'description' => 'Fluffy pancakes loaded with fresh blueberries and topped with maple syrup.',
                    'category_id' => 7,
                    'picture' => 'imagesRecepies/Normal/blueberry_pancakes.jpg',
                    'ingredients' => [
                        '1 cup all-purpose flour',
                        '2 tbsp sugar',
                        '1 tsp baking powder',
                        '1/2 tsp baking soda',
                        '1/4 tsp salt',
                        '1 cup buttermilk',
                        '1 egg',
                        '2 tbsp melted butter',
                        '1 cup fresh blueberries',
                        'Maple syrup'
                    ],
                    'preparationSteps' => [
                        'In a large bowl, whisk together the flour, sugar, baking powder, baking soda, and salt.',
                        'In a separate bowl, whisk together the buttermilk, egg, and melted butter.',
                        'Pour the wet ingredients into the dry ingredients and stir until just combined.',
                        'Fold in the fresh blueberries.',
                        'Heat a non-stick skillet or griddle over medium heat and lightly grease with butter or oil.',
                        'Pour 1/4 cup of batter onto the skillet for each pancake.',
                        'Cook until bubbles form on the surface of the pancake and the edges are set, then flip and cook until golden brown on the other side.',
                        'Serve the pancakes warm with maple syrup.'
                    ]
            ],
            [
                    'id' => 10,
                    'recipeTitle' => 'Shrimp Tacos',
                    'description' => 'Tasty shrimp tacos with a zesty lime slaw and creamy avocado sauce.',
                    'category_id' => 1,
                    'picture' => 'imagesRecepies/Normal/shrimp_tacos.jpg',
                    'ingredients' => [
                        '500g shrimp, peeled and deveined',
                        '1 tbsp olive oil',
                        '1 tsp chili powder',
                        '1/2 tsp garlic powder',
                        '1/2 tsp cumin',
                        '1/4 tsp salt',
                        '8 small tortillas',
                        '1 cup shredded cabbage',
                        '1/4 cup chopped cilantro',
                        '1 lime, juiced',
                        '1 avocado',
                        '1/4 cup sour cream',
                        'Salt and pepper'
                    ],
                    'preparationSteps' => [
                        'In a large bowl, toss the shrimp with olive oil, chili powder, garlic powder, cumin, and salt.',
                        'Heat a large skillet over medium-high heat and cook the shrimp until pink and opaque, about 2-3 minutes per side.',
                        'In a small bowl, combine the shredded cabbage, chopped cilantro, and lime juice. Season with salt and pepper.',
                        'In a blender, combine the avocado, sour cream, salt, and pepper. Blend until smooth and creamy.',
                        'Warm the tortillas in a dry skillet or microwave.',
                        'Assemble the tacos by placing a few shrimp on each tortilla, followed by the lime slaw and a drizzle of avocado sauce.',
                        'Serve immediately.'
                    ]
            ],
            [
                        'id' => 11,
                        'recipeTitle' => 'Margherita Pizza',
                        'description' => 'A classic pizza with tomato sauce, mozzarella cheese, and fresh basil.',
                        'category_id' => 1,
                        'picture' => 'imagesRecepies/Normal/margherita_pizza.jpg',
                        'ingredients' => [
                            '1 pizza dough',
                            '1 cup tomato sauce',
                            '2 cups shredded mozzarella cheese',
                            '1/4 cup fresh basil leaves',
                            '1 tbsp olive oil',
                            'Salt and pepper'
                        ],
                        'preparationSteps' => [
                            'Preheat the oven to 475°F (245°C).',
                            'Roll out the pizza dough on a floured surface.',
                            'Spread the tomato sauce evenly over the dough.',
                            'Sprinkle the shredded mozzarella cheese on top of the sauce.',
                            'Add the fresh basil leaves and drizzle with olive oil.',
                            'Season with salt and pepper.',
                            'Bake the pizza for 10-12 minutes, until the crust is golden and the cheese is bubbly.',
                            'Slice and serve immediately.'
                        ]
            ],
            [
                        'id' => 12,
                        'recipeTitle' => 'Chicken Alfredo Pasta',
                        'description' => 'A creamy pasta dish with chicken, Parmesan cheese, and a rich Alfredo sauce.',
                        'category_id' => 1,
                        'picture' => 'imagesRecepies/Normal/chicken_alfredo_pasta.jpg',
                        'ingredients' => [
                            '2 chicken breasts',
                            '400g fettuccine pasta',
                            '1 cup heavy cream',
                            '1/2 cup grated Parmesan cheese',
                            '2 cloves garlic, minced',
                            '2 tbsp butter',
                            'Salt and pepper',
                            '2 tbsp chopped parsley'
                        ],
                        'preparationSteps' => [
                            'Cook the fettuccine pasta according to package instructions.',
                            'In a large skillet, melt the butter over medium heat.',
                            'Add the minced garlic and cook until fragrant.',
                            'Add the chicken breasts and cook until golden brown and fully cooked, then slice them.',
                            'Pour in the heavy cream and bring to a simmer.',
                            'Stir in the grated Parmesan cheese until the sauce is smooth and creamy.',
                            'Add the cooked pasta and sliced chicken to the skillet and toss to coat with the sauce.',
                            'Season with salt and pepper and garnish with chopped parsley.',
                            'Serve immediately.'
                        ]
                    
            ],
            [
                        'id' => 13,
                        'recipeTitle' => 'Beef Tacos',
                        'description' => 'Tasty beef tacos with a flavorful ground beef filling and fresh toppings.',
                        'category_id' => 1,
                        'picture' => 'imagesRecepies/Normal/beef_tacos.jpg',
                        'ingredients' => [
                            '500g ground beef',
                            '1 packet taco seasoning',
                            '1/2 cup water',
                            '8 taco shells',
                            '1 cup shredded lettuce',
                            '1 cup diced tomatoes',
                            '1 cup shredded cheese',
                            '1/2 cup sour cream',
                            '1/4 cup chopped cilantro'
                        ],
                        'preparationSteps' => [
                            'In a large skillet, cook the ground beef over medium heat until browned.',
                            'Drain any excess grease and stir in the taco seasoning and water.',
                            'Simmer for 5 minutes until the beef is fully coated in the seasoning.',
                            'Warm the taco shells in a dry skillet or microwave.',
                            'Assemble the tacos by filling each shell with seasoned beef, shredded lettuce, diced tomatoes, shredded cheese, sour cream, and chopped cilantro.',
                            'Serve immediately.'
                        ]
                ],
                [
                        'id' => 14,
                        'recipeTitle' => 'Greek Salad',
                        'description' => 'A refreshing salad with cucumbers, tomatoes, olives, feta cheese, and a tangy dressing.',
                        'category_id' => 4,
                        'picture' => 'imagesRecepies/Normal/greek_salad.jpg',
                        'ingredients' => [
                            '1 cucumber',
                            '2 tomatoes',
                            '1/2 red onion',
                            '1/4 cup Kalamata olives',
                            '1/4 cup crumbled feta cheese',
                            '2 tbsp olive oil',
                            '1 tbsp red wine vinegar',
                            '1 tsp dried oregano',
                            'Salt and pepper'
                        ],
                        'preparationSteps' => [
                            'Chop the cucumber, tomatoes, and red onion into bite-sized pieces.',
                            'In a large salad bowl, combine the chopped vegetables, Kalamata olives, and crumbled feta cheese.',
                            'In a small bowl, whisk together the olive oil, red wine vinegar, dried oregano, salt, and pepper.',
                            'Pour the dressing over the salad and toss to combine.',
                            'Serve immediately.'
                        ]
                ],
                [
                        'id' => 15,
                        'recipeTitle' => 'Chocolate Lava Cake',
                        'description' => 'A rich and gooey chocolate cake with a molten center.',
                        'category_id' => 3,
                        'picture' => 'imagesRecepies/Normal/chocolate_lava_cake.jpg',
                        'ingredients' => [
                            '1/2 cup unsalted butter',
                            '1 cup semisweet chocolate chips',
                            '1 cup powdered sugar',
                            '2 large eggs',
                            '2 large egg yolks',
                            '1 tsp vanilla extract',
                            '1/4 cup all-purpose flour',
                            'Butter for greasing',
                            'Powdered sugar for dusting'
                        ],
                        'preparationSteps' => [
                            'Preheat the oven to 425°F (220°C).',
                            'Grease four ramekins with butter and dust with powdered sugar.',
                            'In a microwave-safe bowl, melt the butter and chocolate chips together in 30-second intervals, stirring until smooth.',
                            'Stir in the powdered sugar until well combined.',
                            'Whisk in the eggs, egg yolks, and vanilla extract until smooth.',
                            'Stir in the flour until just combined.',
                            'Divide the batter evenly among the prepared ramekins.',
                            'Bake for 12-14 minutes until the edges are set but the center is still soft.',
                            'Let the cakes cool for 1 minute before inverting onto plates.',
                            'Dust with powdered sugar and serve immediately.'
                        ]
                ],
                [
                        'id' => 16,
                        'recipeTitle' => 'Vegetable Lasagna',
                        'description' => 'A delicious lasagna layered with vegetables, ricotta cheese, and marinara sauce.',
                        'category_id' => 1,
                        'picture' => 'imagesRecepies/Normal/vegetable_lasagna.jpg',
                        'ingredients' => [
                            '12 lasagna noodles',
                            '2 cups marinara sauce',
                            '1 cup ricotta cheese',
                            '2 cups shredded mozzarella cheese',
                            '1/2 cup grated Parmesan cheese',
                            '1 zucchini, sliced',
                            '1 bell pepper, sliced',
                            '1 cup spinach',
                            '2 cloves garlic, minced',
                            '2 tbsp olive oil',
                            'Salt and pepper'
                        ],
                        'preparationSteps' => [
                            'Preheat the oven to 375°F (190°C).',
                            'Cook the lasagna noodles according to package instructions and drain.',
                            'In a large pan, heat the olive oil over medium heat.',
                            'Add the minced garlic and cook until fragrant.',
                            'Add the sliced zucchini, bell pepper, and spinach, and cook until tender.',
                            'Spread a layer of marinara sauce in the bottom of a baking dish.',
                            'Layer with lasagna noodles, ricotta cheese, vegetables, and shredded mozzarella cheese.',
                            'Repeat layers, ending with noodles and sauce on top.',
                            'Sprinkle with grated Parmesan cheese.',
                            'Cover with aluminum foil and bake for 25 minutes.',
                            'Remove the foil and bake for an additional 10 minutes until the cheese is melted and bubbly.',
                            'Let cool for a few minutes before serving.'
                        ]
                ],
                [
                        'id' => 17,
                        'recipeTitle' => 'Chicken Fajitas',
                        'description' => 'Sizzling chicken fajitas with bell peppers, onions, and a zesty seasoning.',
                        'category_id' => 1,
                        'picture' => 'imagesRecepies/Normal/chicken_fajitas.jpg',
                        'ingredients' => [
                            '2 chicken breasts, sliced',
                            '1 red bell pepper, sliced',
                            '1 yellow bell pepper, sliced',
                            '1 onion, sliced',
                            '2 tbsp olive oil',
                            '1 packet fajita seasoning',
                            '8 small tortillas',
                            '1/2 cup sour cream',
                            '1/2 cup salsa',
                            '1/4 cup chopped cilantro',
                            '1 lime, cut into wedges'
                        ],
                        'preparationSteps' => [
                            'In a large bowl, toss the sliced chicken, bell peppers, and onion with olive oil and fajita seasoning.',
                            'Heat a large skillet over medium-high heat and cook the chicken mixture until the chicken is cooked through and the vegetables are tender.',
                            'Warm the tortillas in a dry skillet or microwave.',
                            'Serve the chicken fajitas with sour cream, salsa, chopped cilantro, and lime wedges.',
                            'Enjoy immediately.'
                        ]
                ],
                [
                        'id' => 18,
                        'recipeTitle' => 'Beef Stroganoff',
                        'description' => 'Tender beef in a creamy mushroom sauce served over egg noodles.',
                        'category_id' => 1,
                        'picture' => 'imagesRecepies/Normal/beef_stroganoff.jpg',
                        'ingredients' => [
                            '500g beef sirloin, sliced',
                            '1 onion, chopped',
                            '2 cloves garlic, minced',
                            '200g mushrooms, sliced',
                            '1 cup beef broth',
                            '1 cup sour cream',
                            '2 tbsp flour',
                            '2 tbsp butter',
                            '2 tbsp olive oil',
                            'Salt and pepper',
                            '4 cups cooked egg noodles',
                            '2 tbsp chopped parsley'
                        ],
                        'preparationSteps' => [
                            'In a large skillet, heat the olive oil over medium-high heat.',
                            'Add the sliced beef and cook until browned, then remove from the skillet and set aside.',
                            'In the same skillet, add the butter and sauté the chopped onion, minced garlic, and sliced mushrooms until tender.',
                            'Stir in the flour and cook for 1 minute.',
                            'Gradually add the beef broth, stirring constantly until the sauce thickens.',
                            'Return the beef to the skillet and stir in the sour cream.',
                            'Season with salt and pepper.',
                            'Serve the beef stroganoff over cooked egg noodles and garnish with chopped parsley.',
                            'Enjoy immediately.'
                        ]
                    
                ],
                [
                        'id' => 19,
                        'recipeTitle' => 'Apple Pie',
                        'description' => 'A classic apple pie with a flaky crust and a sweet, spiced apple filling.',
                        'category_id' =>3,
                        'picture' => 'imagesRecepies/Normal/apple_pie.jpg',
                        'ingredients' => [
                            '2 pie crusts',
                            '6 cups sliced apples',
                            '3/4 cup sugar',
                            '2 tbsp all-purpose flour',
                            '1 tsp ground cinnamon',
                            '1/4 tsp ground nutmeg',
                            '1 tbsp lemon juice',
                            '1 tbsp butter',
                            '1 egg, beaten',
                            '1 tbsp coarse sugar (optional)'
                        ],
                        'preparationSteps' => [
                            'Preheat the oven to 425°F (220°C).',
                            'Roll out one pie crust and fit it into a pie dish.',
                            'In a large bowl, combine the sliced apples, sugar, flour, cinnamon, nutmeg, and lemon juice.',
                            'Pour the apple mixture into the pie crust and dot with butter.',
                            'Roll out the second pie crust and place it over the apples.',
                            'Trim and crimp the edges to seal.',
                            'Cut a few slits in the top crust to allow steam to escape.',
                            'Brush the top crust with the beaten egg and sprinkle with coarse sugar if desired.',
                            'Bake for 45-50 minutes until the crust is golden and the filling is bubbly.',
                            'Let cool before serving.'
                        ]
                    ]
        ];
        

        foreach ($recipes as $recipeData) {
            $recipe = Recipe::create([
                'id' => $recipeData['id'],
                'recipeTitle' => $recipeData['recipeTitle'],
                'description' => $recipeData['description'],
                'category_id' => $recipeData['category_id'],
                'picture' => $recipeData['picture']
            ]);

            foreach ($recipeData['ingredients'] as $ingredient) {
                Ingredient::create([
                    'recipe_id' => $recipe->id,
                    'ingredient' => $ingredient
                ]);
            }

            foreach ($recipeData['preparationSteps'] as $index => $step) {
                PreparationStep::create([
                    'recipe_id' => $recipe->id,
                    'step' => $step,
                    'order' => $index + 1
                ]);
            }
        }
    }
}
