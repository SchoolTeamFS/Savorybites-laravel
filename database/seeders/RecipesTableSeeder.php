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
                'utilisateur_id'=>1,
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
                'recipeTitle' => 'Mac and Cheese',
                'description' => 'Creamy and cheesy macaroni pasta.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/mac_and_cheese.jpg',
                'ingredients' => [
                    '300g elbow macaroni',
                    '2 cups shredded cheddar cheese',
                    '2 cups milk',
                    '2 tablespoons butter',
                    '2 tablespoons flour',
                    'Salt and pepper'
                ],
                'preparationSteps' => [
                    'Cook the macaroni according to package instructions and drain.',
                    'In a saucepan, melt the butter over medium heat.',
                    'Stir in the flour and cook for 1-2 minutes.',
                    'Gradually whisk in the milk and cook until the sauce thickens.',
                    'Add the shredded cheddar cheese and stir until melted.',
                    'Season with salt and pepper to taste.',
                    'Combine the cheese sauce with the cooked macaroni.',
                    'Serve hot.'
                ]
            ],
            [
                'id' => 3,
                'recipeTitle' => 'Pepperoni Pizza',
                'description' => 'A classic pizza topped with pepperoni and mozzarella cheese.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/pepperoni_pizza.jpg',
                'ingredients' => [
                    '1 pizza dough',
                    '1 cup tomato sauce',
                    '2 cups shredded mozzarella cheese',
                    '20 slices pepperoni',
                    '1 teaspoon oregano'
                ],
                'preparationSteps' => [
                    'Preheat the oven to 220°C (425°F).',
                    'Roll out the pizza dough on a baking sheet.',
                    'Spread the tomato sauce over the dough.',
                    'Sprinkle the shredded mozzarella cheese on top.',
                    'Arrange the pepperoni slices over the cheese.',
                    'Sprinkle oregano on top.',
                    'Bake for 15-20 minutes until the crust is golden and the cheese is bubbly.',
                    'Serve hot.'
                ]
            ],
            [
                'id' => 4,
                'recipeTitle' => 'Fried Chicken',
                'description' => 'Crispy fried chicken with a golden crust.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/fried_chicken.jpg',
                'ingredients' => [
                    '8 pieces of chicken (legs, thighs, breasts)',
                    '2 cups buttermilk',
                    '2 cups flour',
                    '1 teaspoon paprika',
                    '1 teaspoon garlic powder',
                    '1 teaspoon salt',
                    '1 teaspoon black pepper',
                    'Vegetable oil for frying'
                ],
                'preparationSteps' => [
                    'Soak the chicken pieces in buttermilk for at least 1 hour.',
                    'In a large bowl, combine flour, paprika, garlic powder, salt, and black pepper.',
                    'Heat vegetable oil in a deep pan or fryer to 175°C (350°F).',
                    'Dredge the soaked chicken pieces in the flour mixture.',
                    'Fry the chicken pieces in batches until golden brown and cooked through, about 10-15 minutes per batch.',
                    'Drain on paper towels and serve hot.'
                ]
            ],
            [
                'id' => 5,
                'recipeTitle' => 'Spaghetti Carbonara',
                'description' => 'Classic Italian pasta with eggs, cheese, and pancetta.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/spaghetti_carbonara.jpg',
                'ingredients' => [
                    '200g spaghetti',
                    '100g pancetta',
                    '2 eggs',
                    '1 cup grated Parmesan cheese',
                    '2 garlic cloves',
                    'Salt and pepper',
                    'Parsley for garnish'
                ],
                'preparationSteps' => [
                    'Cook the spaghetti according to package instructions and drain, reserving some pasta water.',
                    'In a large pan, cook the pancetta over medium heat until crispy.',
                    'Add minced garlic and cook for 1 minute.',
                    'In a bowl, whisk together eggs and grated Parmesan cheese.',
                    'Add the cooked spaghetti to the pan with the pancetta.',
                    'Remove the pan from heat and quickly stir in the egg and cheese mixture, adding pasta water as needed to create a creamy sauce.',
                    'Season with salt and pepper.',
                    'Garnish with parsley and serve immediately.'
                ]
            ],
            [
                'id' => 6,
                'recipeTitle' => 'BBQ Ribs',
                'description' => 'Tender and flavorful barbecue ribs with a smoky sauce.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/bbq_ribs.jpg',
                'ingredients' => [
                    '1 rack of ribs',
                    '1 cup barbecue sauce',
                    '2 tablespoons brown sugar',
                    '1 tablespoon paprika',
                    '1 teaspoon garlic powder',
                    '1 teaspoon onion powder',
                    'Salt and pepper'
                ],
                'preparationSteps' => [
                    'Preheat the oven to 160°C (325°F).',
                    'In a small bowl, mix brown sugar, paprika, garlic powder, onion powder, salt, and pepper.',
                    'Rub the spice mixture all over the ribs.',
                    'Place the ribs on a baking sheet and cover with foil.',
                    'Bake for 2-3 hours until the ribs are tender.',
                    'Remove the foil and brush the ribs with barbecue sauce.',
                    'Increase the oven temperature to 220°C (425°F) and bake for an additional 15-20 minutes until the sauce is bubbly.',
                    'Serve hot.'
                ]
            ],
            [
                'id' => 7,
                'recipeTitle' => 'Chicken Alfredo',
                'description' => 'Creamy fettuccine Alfredo with grilled chicken.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/chicken_alfredo.jpg',
                'ingredients' => [
                    '2 chicken breasts',
                    '200g fettuccine',
                    '1 cup heavy cream',
                    '1/2 cup grated Parmesan cheese',
                    '2 garlic cloves',
                    '2 tablespoons butter',
                    'Salt and pepper',
                    'Parsley for garnish'
                ],
                'preparationSteps' => [
                    'Cook the fettuccine according to package instructions and drain.',
                    'Season the chicken breasts with salt and pepper.',
                    'Grill the chicken until fully cooked and slice.',
                    'In a large pan, melt the butter over medium heat.',
                    'Add minced garlic and cook for 1 minute.',
                    'Add heavy cream and bring to a simmer.',
                    'Stir in grated Parmesan cheese until the sauce is smooth.',
                    'Add the cooked fettuccine and sliced chicken to the pan.',
                    'Toss to combine and coat the pasta in the sauce.',
                    'Garnish with parsley and serve immediately.'
                ]
            ],
            [
                'id' => 8,
                'recipeTitle' => 'Tacos',
                'description' => 'Ground beef tacos with fresh toppings.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/tacos.jpg',
                'ingredients' => [
                    '500g ground beef',
                    '1 taco seasoning packet',
                    '8 taco shells',
                    'Lettuce',
                    'Tomato',
                    'Cheese',
                    'Sour cream',
                    'Salsa'
                ],
                'preparationSteps' => [
                    'Cook the ground beef in a large pan over medium heat until browned.',
                    'Add the taco seasoning packet and follow the package instructions.',
                    'Warm the taco shells in the oven or microwave.',
                    'Assemble the tacos with the seasoned beef, lettuce, diced tomato, shredded cheese, sour cream, and salsa.',
                    'Serve immediately.'
                ]
            ],
            [
                'id' => 9,
                'recipeTitle' => 'Lasagna',
                'description' => 'Layers of pasta, meat sauce, and cheese baked to perfection.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/lasagna.jpg',
                'ingredients' => [
                    '12 lasagna noodles',
                    '500g ground beef',
                    '1 onion',
                    '2 garlic cloves',
                    '800g canned tomatoes',
                    '2 cups ricotta cheese',
                    '2 cups shredded mozzarella cheese',
                    '1 cup grated Parmesan cheese',
                    '1 egg',
                    '1 tablespoon basil',
                    '1 tablespoon oregano',
                    'Salt and pepper'
                ],
                'preparationSteps' => [
                    'Preheat the oven to 175°C (350°F).',
                    'Cook the lasagna noodles according to package instructions and drain.',
                    'In a large skillet, cook the ground beef, diced onion, and minced garlic until the beef is browned.',
                    'Add the canned tomatoes, basil, oregano, salt, and pepper to the skillet.',
                    'Simmer the meat sauce for 15-20 minutes.',
                    'In a bowl, mix the ricotta cheese, egg, and half of the Parmesan cheese.',
                    'Spread a layer of meat sauce on the bottom of a baking dish.',
                    'Layer with lasagna noodles, ricotta mixture, shredded mozzarella, and meat sauce.',
                    'Repeat the layers, ending with a layer of meat sauce and remaining Parmesan cheese.',
                    'Cover with foil and bake for 25 minutes.',
                    'Remove the foil and bake for an additional 25 minutes.',
                    'Let the lasagna rest for 10 minutes before serving.'
                ]
            ],
            [
                'id' => 10,
                'recipeTitle' => 'Chili Cheese Fries',
                'description' => 'Crispy fries topped with chili and melted cheese.',
                'category_id' => 2,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/chili_cheese_fries.jpg',
                'ingredients' => [
                    '4 large potatoes',
                    '500g ground beef',
                    '1 onion',
                    '2 garlic cloves',
                    '1 can kidney beans',
                    '1 can diced tomatoes',
                    '1 tablespoon chili powder',
                    '1 teaspoon cumin',
                    '2 cups shredded cheddar cheese',
                    'Salt and pepper',
                    'Vegetable oil'
                ],
                'preparationSteps' => [
                    'Preheat the oven to 200°C (400°F).',
                    'Peel and cut the potatoes into fries.',
                    'Toss the fries with vegetable oil, salt, and pepper.',
                    'Spread the fries on a baking sheet and bake for 20-25 minutes, until crispy.',
                    'In a skillet, cook the ground beef, diced onion, and minced garlic until the beef is browned.',
                    'Add the kidney beans, diced tomatoes, chili powder, cumin, salt, and pepper to the skillet.',
                    'Simmer the chili for 15-20 minutes.',
                    'Arrange the baked fries on a serving platter.',
                    'Top with the chili and shredded cheddar cheese.',
                    'Bake for an additional 5 minutes, until the cheese is melted.'
                ]
            ],
            [
                'id' => 11,
                'recipeTitle' => 'Bacon-Wrapped Jalapeño Poppers',
                'description' => 'Spicy jalapeños stuffed with cheese and wrapped in bacon.',
                'category_id' => 2,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/bacon_wrapped_jalapeno_poppers.jpg',
                'ingredients' => [
                    '12 jalapeños',
                    '1 cup cream cheese',
                    '1 cup shredded cheddar cheese',
                    '12 slices bacon'
                ],
                'preparationSteps' => [
                    'Preheat the oven to 200°C (400°F).',
                    'Cut the jalapeños in half lengthwise and remove the seeds.',
                    'In a bowl, mix the cream cheese and shredded cheddar cheese.',
                    'Stuff each jalapeño half with the cheese mixture.',
                    'Wrap each stuffed jalapeño with a slice of bacon.',
                    'Place the jalapeño poppers on a baking sheet.',
                    'Bake for 20-25 minutes, until the bacon is crispy.',
                    'Serve hot.'
                ]
            ],
            [
                'id' => 12,
                'recipeTitle' => 'Chicken Alfredo',
                'description' => 'Creamy pasta with grilled chicken and Alfredo sauce.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/chicken_alfredo.jpg',
                'ingredients' => [
                    '2 chicken breasts',
                    '200g fettuccine pasta',
                    '1 cup heavy cream',
                    '1 cup grated Parmesan cheese',
                    '2 tablespoons butter',
                    '2 garlic cloves',
                    'Salt and pepper',
                    'Parsley'
                ],
                'preparationSteps' => [
                    'Cook the fettuccine pasta according to package instructions and drain.',
                    'Season the chicken breasts with salt and pepper.',
                    'Grill the chicken until fully cooked and slice into strips.',
                    'In a saucepan, melt the butter over medium heat.',
                    'Add minced garlic and sauté until fragrant.',
                    'Add the heavy cream and bring to a simmer.',
                    'Stir in the grated Parmesan cheese until melted.',
                    'Add the cooked pasta to the sauce and toss to coat.',
                    'Serve the pasta topped with grilled chicken and chopped parsley.'
                ]
            ],
            [
                'id' => 13,
                'recipeTitle' => 'Chicken Parmesan',
                'description' => 'Breaded chicken breasts topped with marinara sauce and melted cheese.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/chicken_parmesan.jpg',
                'ingredients' => [
                    '2 chicken breasts',
                    '1 cup breadcrumbs',
                    '1/2 cup grated Parmesan cheese',
                    '1 egg',
                    '1 cup marinara sauce',
                    '1 cup shredded mozzarella cheese',
                    'Olive oil',
                    'Salt and pepper',
                    'Basil'
                ],
                'preparationSteps' => [
                    'Preheat the oven to 200°C (400°F).',
                    'Pound the chicken breasts to an even thickness.',
                    'Season the chicken with salt and pepper.',
                    'In a bowl, mix the breadcrumbs and grated Parmesan cheese.',
                    'Dip the chicken breasts in beaten egg, then coat with the breadcrumb mixture.',
                    'Heat olive oil in a skillet over medium heat.',
                    'Cook the chicken breasts until golden brown, about 4-5 minutes per side.',
                    'Transfer the chicken to a baking dish.',
                    'Top each chicken breast with marinara sauce and shredded mozzarella cheese.',
                    'Bake for 15-20 minutes, until the cheese is melted and bubbly.',
                    'Garnish with fresh basil and serve.'
                ]
            ],
            [
                'id' => 14,
                'recipeTitle' => 'Pulled Pork Sandwiches',
                'description' => 'Tender pulled pork served on a bun with BBQ sauce and coleslaw.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/pepperoni_pizza.jpg', // Note: The original file has a duplicate image reference.
                'ingredients' => [
                    '1 kg pork shoulder',
                    '1 cup BBQ sauce',
                    '1/4 cup brown sugar',
                    '1 tablespoon paprika',
                    '1 tablespoon garlic powder',
                    'Salt and pepper',
                    '4 burger buns',
                    'Coleslaw'
                ],
                'preparationSteps' => [
                    'Preheat the oven to 160°C (320°F).',
                    'In a bowl, mix the brown sugar, paprika, garlic powder, salt, and pepper.',
                    'Rub the seasoning mixture all over the pork shoulder.',
                    'Place the pork in a baking dish and cover with foil.',
                    'Bake for 4-5 hours, until the pork is tender and falls apart easily.',
                    'Shred the pork with two forks.',
                    'Mix the shredded pork with BBQ sauce.',
                    'Serve the pulled pork on burger buns with coleslaw.'
                ]
            ],
            [
                'id' => 15,
                'recipeTitle' => 'Chili Con Carne',
                'description' => 'Hearty chili with ground beef, beans, and spices.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/chili_con_carne.jpg',
                'ingredients' => [
                    '500g ground beef',
                    '1 onion',
                    '2 garlic cloves',
                    '1 can kidney beans',
                    '1 can diced tomatoes',
                    '1 tablespoon chili powder',
                    '1 teaspoon cumin',
                    '1 teaspoon paprika',
                    'Salt and pepper',
                    'Cheddar cheese',
                    'Sour cream',
                    'Green onions'
                ],
                'preparationSteps' => [
                    'In a large pot, cook the ground beef, diced onion, and minced garlic over medium heat until the beef is browned.',
                    'Add the kidney beans, diced tomatoes, chili powder, cumin, paprika, salt, and pepper.',
                    'Stir well and bring the mixture to a simmer.',
                    'Reduce heat and let the chili cook for 30-40 minutes, stirring occasionally.',
                    'Serve the chili hot, topped with shredded cheddar cheese, sour cream, and chopped green onions.'
                ]
            ],
            [
                'id' => 16,
                'recipeTitle' => 'Mozzarella Sticks',
                'description' => 'Deep-fried mozzarella sticks served with marinara sauce.',
                'category_id' => 2,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/mozzarella_sticks.jpg',
                'ingredients' => [
                    '200g mozzarella cheese',
                    '1 cup breadcrumbs',
                    '1/2 cup all-purpose flour',
                    '2 eggs',
                    '1 teaspoon Italian seasoning',
                    'Vegetable oil',
                    'Marinara sauce'
                ],
                'preparationSteps' => [
                    'Cut the mozzarella cheese into sticks.',
                    'In a bowl, mix the breadcrumbs and Italian seasoning.',
                    'Dredge the cheese sticks in flour, dip them in beaten eggs, and coat them in the breadcrumb mixture.',
                    'Heat vegetable oil in a deep fryer or large pot to 180°C (350°F).',
                    'Fry the mozzarella sticks in batches until golden brown, about 1-2 minutes.',
                    'Drain on paper towels and serve with marinara sauce.'
                ]
            ],
            [
                'id' => 17,
                'recipeTitle' => 'Fettuccine Carbonara',
                'description' => 'Creamy pasta with bacon, eggs, and Parmesan cheese.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/fettuccine_carbonara.jpg',
                'ingredients' => [
                    '200g fettuccine pasta',
                    '4 slices bacon',
                    '2 eggs',
                    '1 cup grated Parmesan cheese',
                    '2 garlic cloves',
                    'Salt and pepper',
                    'Parsley'
                ],
                'preparationSteps' => [
                    'Cook the fettuccine pasta according to package instructions and drain.',
                    'In a skillet, cook the diced bacon until crispy.',
                    'In a bowl, whisk the eggs and grated Parmesan cheese together.',
                    'Add minced garlic to the skillet and sauté for 1 minute.',
                    'Add the cooked pasta to the skillet and toss to combine.',
                    'Remove from heat and quickly stir in the egg mixture until the pasta is coated.',
                    'Season with salt and pepper and garnish with chopped parsley.',
                    'Serve immediately.'
                ]
            ],
            [
                'id' => 18,
                'recipeTitle' => 'Chocolate Chip Cookies',
                'description' => 'Chewy and delicious chocolate chip cookies.',
                'category_id' => 3,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/chocolate_chip_cookies.jpg',
                'ingredients' => [
                    '1 cup butter',
                    '1 cup sugar',
                    '1 cup brown sugar',
                    '2 eggs',
                    '2 teaspoons vanilla extract',
                    '3 cups all-purpose flour',
                    '1 teaspoon baking soda',
                    '1/2 teaspoon salt',
                    '2 cups chocolate chips'
                ],
                'preparationSteps' => [
                    'Preheat the oven to 180°C (350°F).',
                    'In a large bowl, cream together the butter, sugar, and brown sugar until smooth.',
                    'Beat in the eggs and vanilla extract.',
                    'In another bowl, whisk together the flour, baking soda, and salt.',
                    'Gradually add the dry ingredients to the wet ingredients and mix well.',
                    'Stir in the chocolate chips.',
                    'Drop rounded spoonfuls of dough onto a baking sheet.',
                    'Bake for 10-12 minutes, until the edges are golden brown.',
                    'Cool on wire racks before serving.'
                ]
            ],
            [
                'id' => 19,
                'recipeTitle' => 'Stuffed Crust Pizza',
                'description' => 'Pizza with a cheese-stuffed crust, topped with pepperoni and mozzarella.',
                'category_id' => 1,
                'utilisateur_id'=>1,
                'picture' => 'imagesRecepies/Normal/stuffed_crust_pizza.jpg',
                'ingredients' => [
                    '1 pizza dough',
                    '1 cup tomato sauce',
                    '2 cups shredded mozzarella cheese',
                    '1 cup string cheese',
                    '100g pepperoni slices',
                    'Olive oil',
                    'Oregano'
                ],
                'preparationSteps' => [
                    'Preheat the oven to 220°C (425°F).',
                    'Roll out the pizza dough on a floured surface.',
                    'Place the string cheese around the edge of the dough and fold the dough over to seal the cheese.',
                    'Transfer the dough to a pizza stone or baking sheet.',
                    'Spread the tomato sauce evenly over the dough.',
                    'Sprinkle shredded mozzarella cheese on top.',
                    'Arrange the pepperoni slices over the cheese.',
                    'Drizzle with olive oil and sprinkle with oregano.',
                    'Bake for 12-15 minutes, until the crust is golden and the cheese is bubbly.',
                    'Slice and serve hot.'
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
