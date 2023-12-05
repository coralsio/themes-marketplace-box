<?php

$categories = [];
$posts = [];

if (\Schema::hasTable('posts')
    && class_exists(\Corals\Modules\CMS\Models\Page::class)
    && class_exists(\Corals\Modules\CMS\Models\Post::class)
) {
    \Corals\Modules\CMS\Models\Page::updateOrCreate(['slug' => 'home', 'type' => 'page',],
        array(
            'title' => 'Home',
            'slug' => 'home',
            'meta_keywords' => 'home',
            'meta_description' => 'home',
            'content' => '',
            'published' => 1,
            'published_at' => '2017-11-16 14:26:52',
            'private' => 0,
            'type' => 'page',
            'template' => 'home',
            'author_id' => 1,
            'deleted_at' => null,
            'created_at' => '2017-11-16 16:27:04',
            'updated_at' => '2017-11-16 16:27:07',
        ));

    \Corals\Modules\CMS\Models\Page::updateOrCreate(['slug' => 'about-us', 'type' => 'page'],
        array(
            'title' => 'About Us',
            'slug' => 'about-us',
            'meta_keywords' => 'about us',
            'meta_description' => 'about us',
            'content' => '<div class="row">
                <div class="col-md-9">
                    <p class="lead">Aliquet fusce eget quisque posuere condimentum lectus molestie pulvinar placerat ac interdum maecenas mollis ad nostra rutrum ornare arcu taciti vitae lobortis eleifend iaculis turpis vitae cras tellus ultricies odio</p>
                </div>
            </div>
            <div class="gap gap-small"></div>
            <div class="row row-col-gap">
                <div class="col-md-8">
                    <img class="full-width" src="/assets/themes/marketplace-box/img/street_960x480.jpg" alt="Image Alternative text" title="Image Title" />
                </div>
                <div class="col-md-4">
                    <h3 class="widget-title">Our Story</h3>
                    <p>Suspendisse nascetur tellus lacinia volutpat dictumst blandit scelerisque nullam ut ipsum proin hac morbi donec porttitor facilisi elementum facilisis per accumsan pretium aliquet commodo non duis est vestibulum phasellus leo</p>
                    <p>Fringilla pulvinar fermentum nunc augue id conubia luctus sociosqu himenaeos dictum duis lobortis penatibus class nascetur fames pulvinar varius pulvinar</p>
                    <p>Dignissim nascetur fringilla ligula luctus nisl habitasse ut ac sociis nisi tristique consectetur potenti curae nascetur pellentesque duis odio ornare</p>
                    <p>Vestibulum sem consectetur iaculis torquent lobortis dis libero risus parturient</p>
                </div>
            </div>
            <div class="gap gap-small"></div>
            <div class="row row-col-gap">
                <div class="col-md-6">
                    <h3 class="widget-title">The Community</h3>
                    <p>Vestibulum congue litora fusce aenean at facilisi volutpat lorem mi consequat natoque tincidunt eget etiam nascetur iaculis iaculis non ultricies</p>
                    <p>Metus porta lobortis convallis lacinia integer platea cum pharetra duis nulla lectus himenaeos hac condimentum viverra condimentum morbi maecenas elit vestibulum vulputate nisl dignissim mus lacus sem euismod venenatis at</p>
                    <p>Varius mattis rutrum nostra habitant feugiat condimentum faucibus taciti porttitor</p>
                </div>
                <div class="col-md-6">
                    <img class="full-width" src="/assets/themes/marketplace-box/img/girls_party_smile_550x210.jpg" alt="Image Alternative text" title="Image Title" />
                </div>
            </div>
            <div class="gap gap-small"></div>
            <div class="row row-col-gap">
                <div class="col-md-9">
                    <div class="row row-sm-gap" data-gutter="10">
                        <div class="col-md-2">
                            <img class="full-width" src="/assets/themes/marketplace-box/img/1_300x300.jpg" alt="Image Alternative text" title="Image Title" />
                        </div>
                        <div class="col-md-2">
                            <img class="full-width" src="/assets/themes/marketplace-box/img/2_300x300.jpg" alt="Image Alternative text" title="Image Title" />
                        </div>
                        <div class="col-md-2">
                            <img class="full-width" src="/assets/themes/marketplace-box/img/3_300x300.jpg" alt="Image Alternative text" title="Image Title" />
                        </div>
                        <div class="col-md-2">
                            <img class="full-width" src="/assets/themes/marketplace-box/img/4_300x300.jpg" alt="Image Alternative text" title="Image Title" />
                        </div>
                        <div class="col-md-2">
                            <img class="full-width" src="/assets/themes/marketplace-box/img/5_300x300.jpg" alt="Image Alternative text" title="Image Title" />
                        </div>
                        <div class="col-md-2">
                            <img class="full-width" src="/assets/themes/marketplace-box/img/6_300x300.jpg" alt="Image Alternative text" title="Image Title" />
                        </div>
                        <div class="col-md-2">
                            <img class="full-width" src="/assets/themes/marketplace-box/img/7_300x300.jpg" alt="Image Alternative text" title="Image Title" />
                        </div>
                        <div class="col-md-2">
                            <img class="full-width" src="/assets/themes/marketplace-box/img/8_300x300.jpg" alt="Image Alternative text" title="Image Title" />
                        </div>
                        <div class="col-md-2">
                            <img class="full-width" src="/assets/themes/marketplace-box/img/9_300x300.jpg" alt="Image Alternative text" title="Image Title" />
                        </div>
                        <div class="col-md-2">
                            <img class="full-width" src="/assets/themes/marketplace-box/img/10_300x300.jpg" alt="Image Alternative text" title="Image Title" />
                        </div>
                        <div class="col-md-2">
                            <img class="full-width" src="/assets/themes/marketplace-box/img/11_300x300.jpg" alt="Image Alternative text" title="Image Title" />
                        </div>
                        <div class="col-md-2">
                            <img class="full-width" src="/assets/themes/marketplace-box/img/12_300x300.jpg" alt="Image Alternative text" title="Image Title" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h3 class="widget-title">Behind The Scenes</h3>
                    <p>Mi suspendisse sodales condimentum cum maecenas conubia massa morbi tristique ante iaculis sociosqu fusce lobortis phasellus nisi massa praesent torquent</p>
                    <p>Ultricies nullam ornare vitae justo ipsum nisi inceptos cursus blandit</p>
                    <p>Ipsum convallis quisque iaculis lectus orci facilisis maecenas mauris tristique</p>
                </div>
            </div>',
            'published' => 1,
            'published_at' => '2017-11-16 11:56:34',
            'private' => 0,
            'type' => 'page',
            'template' => 'full',
            'author_id' => 1,
            'deleted_at' => null,
            'created_at' => '2017-11-16 11:56:34',
            'updated_at' => '2017-11-16 11:56:34',
        ));

    \Corals\Modules\CMS\Models\Page::updateOrCreate(['slug' => 'blog', 'type' => 'page'],
        array(
            'title' => 'Blog',
            'slug' => 'blog',
            'meta_keywords' => 'Blog',
            'meta_description' => 'Blog',
            'content' => '',
            'published' => 1,
            'published_at' => '2017-11-16 11:56:34',
            'private' => 0,
            'type' => 'page',
            'template' => 'left',
            'author_id' => 1,
            'deleted_at' => null,
            'created_at' => '2017-11-16 11:56:34',
            'updated_at' => '2017-11-16 11:56:34',
        ));
    \Corals\Modules\CMS\Models\Page::updateOrCreate(['slug' => 'pricing', 'type' => 'page'],
        array(
            'title' => 'Pricing',
            'meta_keywords' => 'Pricing',
            'meta_description' => 'Pricing',
            'content' => '',
            'published' => 1,
            'published_at' => '2017-11-16 11:56:34',
            'private' => 0,
            'type' => 'page',
            'status' => 'inactive',
            'template' => 'full',
            'author_id' => 1,
            'deleted_at' => null,
            'created_at' => '2017-11-16 11:56:34',
            'updated_at' => '2017-11-16 11:56:34',
        ));
    \Corals\Modules\CMS\Models\Page::updateOrCreate(['slug' => 'contact-us', 'type' => 'page'],
        array(
            'title' => 'Contact Us',
            'slug' => 'contact-us',
            'meta_keywords' => 'Contact Us',
            'meta_description' => 'Contact Us',
            'content' => '<div class="row">
            <div class="col">
                <div class="text-center">
                    <h3>Drop Your Message here</h3>
                    <p>You can contact us with anything related to Laraship. <br/> We\'ll get in touch with you as soon as
                        possible.</p>
                </div>
            </div>
        </div>',
            'published' => 1,
            'published_at' => '2017-11-16 11:56:34',
            'private' => 0,
            'type' => 'page',
            'template' => 'contact',
            'author_id' => 1,
            'deleted_at' => null,
            'created_at' => '2017-11-16 11:56:34',
            'updated_at' => '2017-11-16 11:56:34',
        ));

    $posts[] = \Corals\Modules\CMS\Models\Post::updateOrCreate([
        'slug' => 'subscription-commerce-trends-for-2018',
        'type' => 'post'
    ],
        array(
            'title' => 'Subscription Commerce Trends for 2018',
            'meta_keywords' => null,
            'meta_description' => null,
            'content' => '<p>Subscription commerce is ever evolving. A few years ago, who would have expected&nbsp;<a href="https://techcrunch.com/2017/10/10/porsche-launches-on-demand-subscription-for-its-sports-cars-and-suvs/" target="_blank">Porsche</a>&nbsp;to launch a subscription service? Or that monthly boxes of beauty samples or shaving supplies and&nbsp;<a href="https://www.pymnts.com/subscription-commerce/2017/how-over-the-top-services-came-out-on-top/" target="_blank">OTT services</a>&nbsp;would propel the subscription model to new heights? And how will these trends shape the subscription space going forward&mdash;and drive growth and innovation?</p>

<p>Regardless of your billing model, there&rsquo;s an opportunity for you to capitalize on many of the current trends in subscription commerce&mdash;trends that will help you to continue to compete and succeed in your industry.</p>

<h3><strong>What are these trends and how can you learn more?</strong></h3>

<p>These trends are outlined in our &ldquo;Top Ten Trends for 2018&rdquo; which we publish every year to help subscription businesses understand the drivers which may impact them in 2018 and beyond.</p>

<p>One trend, for example, is machine learning and data science which the payments industry is increasingly utilizing to deliver more powerful results for their customers.</p>

<p>Another trend which is driving new revenue is the adoption of a hybrid billing model&mdash; subscription businesses seamlessly sell one-time items and &lsquo;traditional&rsquo; businesses add a subscription component as a means to introduce a new revenue stream.</p>

<p>And while subscriber acquisition is not a new trend, there are some sophisticated ways to acquire new customers that subscription businesses are putting to work for increasingly positive effect.</p>

<p>Download this year&rsquo;s edition and see how these trends and insights can help your subscription business succeed in 2018.</p>

<p>&nbsp;</p>',
            'published' => 1,
            'published_at' => '2017-12-04 11:18:23',
            'private' => 0,
            'type' => 'post',
            'template' => null,
            'author_id' => 1,
            'deleted_at' => null,
            'created_at' => '2017-12-03 23:45:51',
            'updated_at' => '2017-12-04 13:18:23',
        ));
    $posts[] = \Corals\Modules\CMS\Models\Post::updateOrCreate([
        'slug' => 'using-machine-learning-to-optimize-subscription-billing',
        'type' => 'post'
    ],
        array(
            'title' => 'Using Machine Learning to Optimize Subscription Billing',
            'meta_keywords' => null,
            'meta_description' => null,
            'content' => '<p>As a data scientist at Recurly, my job is to use the vast amount of data that we have collected to build products that make subscription businesses more successful. One way to think about data science at Recurly is as an extended R&amp;D department for our customers. We use a variety of tools and techniques, attack problems big and small, but at the end of the day, our goal is to put all of Recurly&rsquo;s expertise to work in service of your business.</p>

<p>Managing a successful subscription business requires a wide range of decisions. What is the optimum structure for subscription plans and pricing? What are the most effective subscriber acquisition methods? What are the most efficient collection methods for delinquent subscribers? What strategies will reduce churn and increase revenue?</p>

<p>At Recurly, we&#39;re focused on building the most flexible subscription management platform, a platform that provides a competitive advantage for your business. We reduce the complexity of subscription billing so you can focus on winning new subscribers and delighting current subscribers.</p>

<p>Recently, we turned to data science to tackle a big problem for subscription businesses: involuntary churn.</p>

<h3><strong>The Problem: The Retry Schedule</strong></h3>

<p>One of the most important factors in subscription commerce is subscriber retention. Every billing event needs to occur flawlessly to avoid adversely impacting the subscriber relationship or worse yet, to lose that subscriber to churn.</p>

<p>Every time a subscription comes up for renewal, Recurly creates an invoice and initiates a transaction using the customer&rsquo;s stored billing information, typically a credit card. Sometimes, this transaction is declined by the payment processor or the customer&rsquo;s bank. When this happens, Recurly sends reminder emails to the customer, checks with the Account Updater service to see if the customer&#39;s card has been updated, and also attempts to collect payment at various intervals over a period of time defined by the subscription business. The timing of these collection attempts is called the &ldquo;retry schedule.&rdquo;</p>

<p>Our ability to correct and successfully retry these cards prevents lost revenue, positively impacts your bottom line, and increases your customer retention rate.</p>

<p>Other subscription providers typically offer a static, one-size-fits-all retry schedule, or leave the schedule up to the subscription business, without providing any guidance. In contrast, Recurly can use machine learning to craft a retry schedule that is tailored to each individual invoice based on our historical data with hundreds of millions of transactions. Our approach gives each invoice the best chance of success, without any manual work by our customers.</p>

<p>A key component of Recurly&rsquo;s values is to test, learn and iterate. How did we call on those values to build this critical component of the Recurly platform?</p>

<h3><strong>Applying Machine Learning</strong></h3>

<p>We decided to use statistical models that leverage Recurly&rsquo;s data on transactions (hundreds of millions of transactions built up over years from a wide variety of different businesses) to predict which transactions are likely to succeed. Then, we used these models to craft the ideal retry schedule for each individual invoice. The process of building the models is known as machine learning.</p>

<p>The term &quot;machine learning&quot; encompasses many different processes and methods, but at its heart is an effort to go past explicitly programmed logic and allow a computer to arrive at the best logic on its own.</p>

<p>While humans are optimized for learning certain tasks&mdash;like how children can speak a new language after simply listening for a few months&mdash;computers can also be trained to learn patterns. Aggregating hundreds of millions of transactions to look for the patterns that lead to transaction success is a classic machine learning problem.</p>

<p>A typical machine learning project involves gathering data, training a statistical model on that data, and then evaluating the performance of the model when presented with new data. A model is only as good as the data it&rsquo;s trained on, and here we had a huge advantage.</p>',
            'published' => 1,
            'published_at' => '2017-12-04 11:21:25',
            'private' => 0,
            'type' => 'post',
            'template' => null,
            'author_id' => 1,
            'deleted_at' => null,
            'created_at' => '2017-12-04 13:21:25',
            'updated_at' => '2017-12-04 13:21:25',
        ));
    $posts[] = \Corals\Modules\CMS\Models\Post::updateOrCreate([
        'slug' => 'why-you-need-a-blog-subscription-landing-page',
        'type' => 'post'
    ],
        array(
            'title' => 'Why You Need A Blog Subscription Landing Page',
            'meta_keywords' => null,
            'meta_description' => null,
            'content' => '<p>Whether subscribing via email or RSS, your site visitor is individually volunteering to add your content to their day; a day that is already crowded with content from emails, texts, voicemails, site content, and even snail mail. &nbsp;</p>

<p>As a business, each time you receive a new blog subscriber, you have received validation or &quot;a vote&quot; that your audience has identified YOUR content as adding value to their day. With each new blog subscriber, your content is essentially being awarded as being highly relevant to conversations your readers are having on a regular basis.&nbsp;</p>

<p>To best promote the content your blog subscribers can expect to receive on an ongoing basis,&nbsp;<strong>consider adding a blog subscription landing page.&nbsp;</strong>This is a quick win that will help your company enhance the blogging subscription experience and help you measure and manage the success of this offer with analytical insight.</p>

<p>Holistically, your goal with this landing page is to provide visitors with a sneak preview of the experience they will receive by becoming a blog subscriber.<strong>&nbsp;Your blog subscription landing page should include:</strong></p>

<ul>
<li><strong>A high-level overview of topics, categories your blog will discuss.&nbsp;&nbsp;</strong>For example, HubSpot&#39;s blog covers &quot;all of the inbound marketing - SEO, Blogging, Social Media, Landing Pages, Lead Generation, and Analytics.&quot;</li>
<li><strong>Insight into &quot;who&quot; your blog will benefit.&nbsp;&nbsp;</strong>Examples may include HR Directors, Financial Business professionals, Animal Enthusiasts, etc.&nbsp; If your blog appeals to multiple personas, feel free to spell this out.&nbsp; This will help assure your visitor that they are joining a group of like-minded individuals who share their interests and goals.&nbsp;&nbsp;</li>
<li><strong>How your blog will help to drive the relevant conversation.&nbsp;</strong>Examples may include &quot;updates on industry events&quot;, &quot;expert editorials&quot;, &quot;insider tips&quot;, etc.&nbsp;&nbsp;</li>
</ul>

<p><strong>To create your blog subscription landing page, consider the following steps:</strong></p>

<p>1) Create your landing page following&nbsp;landing page best practices.&nbsp; Consider the &quot;subscribing to your blog&quot; offer as similar to other offers you promote using Landing Pages.&nbsp;</p>

<p>2) Create a Call To Action button that will link to this landing page.&nbsp; Use this button as a call to action within your blog articles or on other website pages to link to a blog subscription landing page&nbsp;Make sure your CTA button is supercharged!</p>

<p>3)&nbsp;Create a Thank You Page&nbsp;to complete the sign-up experience with gratitude and a follow-up call to action.&nbsp;</p>

<p>4) Measure the success of your blog subscription landing page.&nbsp;Consider the 3 Secrets to Optimizing Landing Page Copy.&nbsp;</p>

<p>For more information on Blogging Success Strategies,&nbsp;check out more Content Camp Resources and recorded webinars.&nbsp;</p>',
            'published' => 1,
            'published_at' => '2017-12-04 11:33:19',
            'private' => 0,
            'type' => 'post',
            'template' => null,
            'author_id' => 1,
            'deleted_at' => null,
            'created_at' => '2017-12-04 13:31:46',
            'updated_at' => '2017-12-04 13:33:19',
        ));
}

if (\Schema::hasTable('categories') && class_exists(\Corals\Modules\CMS\Models\Category::class)) {
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Computers',
        'slug' => 'computers',
    ]);
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Smartphone',
        'slug' => 'smartphone',
    ]);
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Gadgets',
        'slug' => 'gadgets',
    ]);
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Technology',
        'slug' => 'technology',
    ]);
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Engineer',
        'slug' => 'engineer',
    ]);
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Subscriptions',
        'slug' => 'subscriptions',
    ]);
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Billing',
        'slug' => 'billing',
    ]);
}

$posts_media = [
    0 => array(
        'id' => 4,
        'model_type' => 'Corals\\Modules\\CMS\\Models\\Post',
        'collection_name' => 'featured-image',
        'name' => 'subscription_trends',
        'file_name' => 'subscription_trends.png',
        'mime_type' => 'image/png',
        'disk' => 'media',
        'size' => 20486,
        'manipulations' => '[]',
        'custom_properties' => '{"root":"demo"}',
        'order_column' => 6,
        'created_at' => '2017-12-03 23:45:51',
        'updated_at' => '2017-12-03 23:45:51',
    ),
    1 => array(
        'id' => 8,
        'model_type' => 'Corals\\Modules\\CMS\\Models\\Post',
        'collection_name' => 'featured-image',
        'name' => 'machine_learning',
        'file_name' => 'machine_learning.png',
        'mime_type' => 'image/png',
        'disk' => 'media',
        'size' => 32994,
        'manipulations' => '[]',
        'custom_properties' => '{"root":"demo"}',
        'order_column' => 11,
        'created_at' => '2017-12-04 13:21:25',
        'updated_at' => '2017-12-04 13:21:25',
    ),
    2 => array(
        'id' => 9,
        'model_type' => 'Corals\\Modules\\CMS\\Models\\Post',
        'collection_name' => 'featured-image',
        'name' => 'Successful-Blog_Fotolia_102410353_Subscription_Monthly_M',
        'file_name' => 'Successful-Blog_Fotolia_102410353_Subscription_Monthly_M.jpg',
        'mime_type' => 'image/jpeg',
        'disk' => 'media',
        'size' => 182317,
        'manipulations' => '[]',
        'custom_properties' => '{"root":"demo"}',
        'order_column' => 12,
        'created_at' => '2017-12-04 13:33:19',
        'updated_at' => '2017-12-04 13:33:19',
    ),
];

foreach ($posts as $index => $post) {
    $randIndex = rand(0, 6);
    if (isset($categories[$randIndex])) {
        $category = $categories[$randIndex];
        try {
            \DB::table('category_post')->insert(array(
                array(
                    'post_id' => $post->id,
                    'category_id' => $category->id,
                )
            ));
        } catch (\Exception $exception) {
        }
    }

    if (isset($posts_media[$index])) {
        try {
            $posts_media[$index]['model_id'] = $post->id;
            \DB::table('media')->insert($posts_media[$index]);
        } catch (\Exception $exception) {
        }
    }
}

if (class_exists(\Corals\Menu\Models\Menu::class) && \Schema::hasTable('posts')) {
    // seed root menus
    $topMenu = Corals\Menu\Models\Menu::updateOrCreate(['key' => 'frontend_top'], [
        'parent_id' => 0,
        'url' => null,
        'name' => 'Frontend Top',
        'description' => 'Frontend Top Menu',
        'icon' => null,
        'target' => null,
        'order' => 0
    ]);

    $topMenuId = $topMenu->id;

    // seed children menu
    Corals\Menu\Models\Menu::updateOrCreate(['key' => 'home'], [
        'parent_id' => $topMenuId,
        'url' => '/',
        'active_menu_url' => '/',
        'name' => 'Home',
        'description' => 'Home Menu Item',
        'icon' => 'fa fa-home',
        'target' => null,
        'order' => 0
    ]);

    Corals\Menu\Models\Menu::updateOrCreate(['parent_id' => $topMenuId, 'key' => 'shop'], [
        'url' => 'shop',
        'active_menu_url' => 'shop',
        'name' => 'Shop',
        'description' => 'Shop Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 965
    ]);

    Corals\Menu\Models\Menu::updateOrCreate([
        'parent_id' => $topMenuId,
        'key' => null,
        'url' => 'about-us',
        'active_menu_url' => 'about-us',
        'name' => 'About Us',
        'description' => 'About Us Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 970
    ]);

    Corals\Menu\Models\Menu::updateOrCreate([
        'parent_id' => $topMenuId,
        'key' => null,
        'url' => 'blog',
        'active_menu_url' => 'blog',
        'name' => 'Blog',
        'description' => 'Blog Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 980
    ]);
    Corals\Menu\Models\Menu::updateOrCreate([
        'parent_id' => $topMenuId,
        'key' => null,
        'url' => 'pricing',
        'active_menu_url' => 'pricing',
        'name' => 'Pricing',
        'description' => 'Pricing Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 980
    ]);

    Corals\Menu\Models\Menu::updateOrCreate([
        'parent_id' => $topMenuId,
        'key' => null,
        'url' => 'faqs',
        'active_menu_url' => 'faqs',
        'name' => 'FAQs',
        'description' => 'FAQs',
        'icon' => null,
        'target' => null,
        'order' => 970
    ]);

    Corals\Menu\Models\Menu::updateOrCreate([
        'parent_id' => $topMenuId,
        'key' => null,
        'url' => 'contact-us',
        'active_menu_url' => 'contact-us',
        'name' => 'Contact Us',
        'description' => 'Contact Us Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 980
    ]);

    $footerMenu = Corals\Menu\Models\Menu::updateOrCreate(['key' => 'frontend_footer'], [
        'parent_id' => 0,
        'url' => null,
        'name' => 'Frontend Footer',
        'description' => 'Frontend Footer Menu',
        'icon' => null,
        'target' => null,
        'order' => 0
    ]);

    $footerMenuId = $footerMenu->id;

// seed children menu
    Corals\Menu\Models\Menu::updateOrCreate(['key' => 'footer_home'], [
        'parent_id' => $footerMenuId,
        'url' => '/',
        'active_menu_url' => '/',
        'name' => 'Home',
        'description' => 'Home Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 0
    ]);
    Corals\Menu\Models\Menu::updateOrCreate([
        'parent_id' => $footerMenuId,
        'key' => null,
        'url' => 'about-us',
        'active_menu_url' => 'about-us',
        'name' => 'About Us',
        'description' => 'About Us Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 980
    ]);
    Corals\Menu\Models\Menu::updateOrCreate([
        'parent_id' => $footerMenuId,
        'key' => null,
        'url' => 'contact-us',
        'active_menu_url' => 'contact-us',
        'name' => 'Contact Us',
        'description' => 'Contact Us Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 980
    ]);
    Corals\Menu\Models\Menu::updateOrCreate([
        'parent_id' => $footerMenuId,
        'key' => null,
        'url' => 'blog',
        'active_menu_url' => 'blog',
        'name' => 'Blog',
        'description' => 'Blog Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 980
    ]);
}


if (class_exists(\Corals\Modules\Marketplace\Models\Product::class) && \Schema::hasTable('marketplace_products')) {
    ///////////////////////// Shippings
    $shippings = array(
        array(
            'priority' => 1,
            'shipping_method' => 'Shippo',
            'name' => 'Shippo',
            'rate' => '0.00',
            'country' => 'US',
            'description' => null
        ),
        array(
            'priority' => 2,
            'shipping_method' => 'FlatRate',
            'rate' => '10.00',
            'country' => null,
            'name' => 'Flat Rate',
            'description' => null
        ),
    );

    foreach ($shippings as $shipping) {
        \Corals\Modules\Marketplace\Models\Shipping::updateOrCreate([
            'shipping_method' => $shipping['shipping_method'],
            'country' => $shipping['country']
        ], $shipping);
    }
    ///////////////////////// Coupons
    $coupons = array(
        array(
            'id' => 1,
            'code' => 'CORALS-FIXED',
            'type' => 'fixed',
            'uses' => null,
            'min_cart_total' => '500.00',
            'max_discount_value' => null,
            'value' => '45',
            'start' => '2018-03-01 00:00:00',
            'expiry' => '2022-03-01 00:00:00',
        ),
        array(
            'id' => 2,
            'code' => 'CORALS-PERC',
            'type' => 'percentage',
            'uses' => null,
            'min_cart_total' => '500.00',
            'max_discount_value' => null,
            'value' => '10',
            'start' => '2018-03-01 00:00:00',
            'expiry' => '2022-03-01 00:00:00',
        ),
    );

    foreach ($coupons as $coupon) {
        \Corals\Modules\Marketplace\Models\Coupon::updateOrCreate(['code' => $coupon['code']], $coupon);
    }

    ///////////////////////// Settings

    $marketplaceSettings = array(
        array(
            'code' => 'marketplace_company_owner',
            'type' => 'TEXT',
            'label' => 'marketplace_company_owner',
            'value' => 'Corals',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_company_name',
            'type' => 'TEXT',
            'label' => 'marketplace_company_name',
            'value' => 'Corals',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_company_street1',
            'type' => 'TEXT',
            'label' => 'marketplace_company_street1',
            'value' => '5543 Aliquet St.',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_company_city',
            'type' => 'TEXT',
            'label' => 'marketplace_company_city',
            'value' => 'Fort Dodge',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_company_state',
            'type' => 'TEXT',
            'label' => 'marketplace_company_state',
            'value' => 'GA',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_company_zip',
            'type' => 'TEXT',
            'label' => 'marketplace_company_zip',
            'value' => '20783',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_company_country',
            'type' => 'TEXT',
            'label' => 'marketplace_company_country',
            'value' => 'USA',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_company_phone',
            'type' => 'TEXT',
            'label' => 'marketplace_company_phone',
            'value' => '(717) 450-4729',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_company_email',
            'type' => 'TEXT',
            'label' => 'marketplace_company_email',
            'value' => 'support@example.com',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_shipping_weight_unit',
            'type' => 'TEXT',
            'label' => 'marketplace_shipping_weight_unit',
            'value' => 'oz',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_shipping_dimensions_unit',
            'type' => 'TEXT',
            'label' => 'marketplace_shipping_dimensions_unit',
            'value' => 'in',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_shipping_shippo_live_token',
            'type' => 'TEXT',
            'label' => 'marketplace_shipping_shippo_live_token',
            'value' => null,
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_shipping_shippo_test_token',
            'type' => 'TEXT',
            'label' => 'marketplace_shipping_shippo_test_token',
            'value' => 'shippo_test_b3aab6f5d5ee5fb9e981906a449d74fe2e7bf9eb',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_shipping_shippo_sandbox_mode',
            'type' => 'TEXT',
            'label' => 'marketplace_shipping_shippo_sandbox_mode',
            'value' => 'true',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_tax_calculate_tax',
            'type' => 'TEXT',
            'label' => 'marketplace_tax_calculate_tax',
            'value' => 'true',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_rating_enable',
            'type' => 'BOOLEAN',
            'label' => 'marketplace_rating_enable',
            'value' => 'true',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_wishlist_enable',
            'type' => 'BOOLEAN',
            'label' => 'marketplace_wishlist_enable',
            'value' => 'true',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_appearance_page_limit',
            'type' => 'TEXT',
            'label' => 'marketplace_appearance_page_limit',
            'value' => '15',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_search_title_weight',
            'type' => 'TEXT',
            'label' => 'marketplace_search_title_weight',
            'value' => '3',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_search_content_weight',
            'type' => 'TEXT',
            'label' => 'marketplace_search_content_weight',
            'value' => '1.5',
            'editable' => 0,
            'hidden' => 1
        ),
        array(
            'code' => 'marketplace_search_enable_wildcards',
            'type' => 'TEXT',
            'label' => 'marketplace_search_enable_wildcards',
            'value' => 'true',
            'editable' => 0,
            'hidden' => 1
        ),
    );

    foreach ($marketplaceSettings as $setting) {
        \Corals\Settings\Models\Setting::updateOrCreate(['code' => $setting['code']], $setting);
    }
}

if (class_exists(\Corals\Modules\Slider\Models\Slider::class) && \Schema::hasTable('sliders')) {
    $slider = \Corals\Modules\Slider\Models\Slider::updateOrCreate(['key' => 'marketplace-home-page-slider'],
        array(
            'name' => 'Marketplace Home Page Slider',
            'key' => 'marketplace-home-page-slider',
            'status' => 'active',
            'type' => 'images',
            'init_options' => json_decode('{"items":{"number":"1"},"margin":{"number":"0"},"loop":{"boolean":"false"},"center":{"boolean":"false"},"mouseDrag":{"boolean":"true"},"touchDrag":{"boolean":"true"},"stagePadding":{"number":"0"},"merge":{"boolean":"false"},"mergeFit":{"boolean":"true"},"autoWidth":{"boolean":"false"},"URLhashListener":{"boolean":"false"},"nav":{"boolean":"false"},"rewind":{"boolean":"true"},"navText":{"array":"[\'next\',\'prev\']"},"dots":{"boolean":"true"},"dotsEach":{"number\\/boolean":"false"},"dotData":{"boolean":"false"},"lazyLoad":{"boolean":"false"},"lazyContent":{"boolean":"false"},"autoplay":{"boolean":"true"},"autoplayTimeout":{"number":"3000"},"autoplayHoverPause":{"boolean":"true"},"autoplaySpeed":{"number\\/boolean":"false"},"navSpeed":{"number\\/boolean":"false"},"dotsSpeed":{"number\\/boolean":"false"},"dragEndSpeed":{"number\\/boolean":"false"},"callbacks":{"boolean":"true"},"responsive":{"object":"false"},"video":{"boolean":"false"},"videoHeight":{"number\\/boolean":"false"},"videoWidth":{"number\\/boolean":"false"},"animateOut":{"array\\/boolean":"false"},"animateIn":{"array\\/boolean":"false"}}',
                true),
        ));
    $slides = array(
        array(
            'name' => 'E-First Slide',
            'content' => '/assets/themes/marketplace-master/img/slider/ecommerce-1.png',
            'slider_id' => $slider->id,
            'status' => 'active',
        ),
        array(
            'name' => 'E-Second Slide',
            'content' => '/assets/themes/marketplace-master/img/slider/ecommerce-2.png',
            'slider_id' => $slider->id,
            'status' => 'active',
        )
    );

    foreach ($slides as $slide) {
        \Corals\Modules\Slider\Models\Slide::updateOrCreate(
            ['slider_id' => $slide['slider_id'], 'name' => $slide['name']],
            $slide
        );
    }
}

if (\Schema::hasTable('cms_blocks') && class_exists(\Corals\Modules\CMS\Models\Block::class)) {
    $block = \Corals\Modules\CMS\Models\Block::updateOrCreate([
        'name' => 'Home Block',
        'key' => 'home-block'
    ], [
        'name' => 'Home Block',
        'key' => 'home-block'
    ]);

    $widgets = array(
        array(
            'title' => 'Discover the mountain',
            'content' => '<div class="banner banner-o-hid" style="background-image:url(/assets/themes/marketplace-box/img/landscape-scotland-nature_380x220.jpg);">
                        <a class="banner-link" href="#"></a>
                        <div class="banner-caption-left">
                            <h5 class="banner-title">Discover The Mountains</h5>
                            <p class="banner-desc">Pro Backpacks 70% Off.</p>
                            <p class="banner-shop-now">Shop Now <i class="fa fa-caret-right"></i>
                            </p>
                        </div>
                        <img class="banner-img" src="/assets/themes/marketplace-box/img/16.png" alt="Image Alternative text" title="Image Title" style="bottom: -68px; right: -32px; width: 200px;">
                    </div>',
            'block_id' => $block->id,
            'widget_width' => 6,
            'widget_order' => 0,
            'status' => 'active',
        ),
        array(
            'title' => 'Winter is Coming',
            'content' => '<div class="banner banner-o-hid" style="background-image:url(/assets/themes/marketplace-box/img/man_back_560x200.jpg);">
                        <a class="banner-link" href="#"></a>
                        <div class="banner-caption-left banner-caption-dark">
                            <h5 class="banner-title">Winter is Coming</h5>
                            <p class="banner-desc">Outwear Collection</p>
                            <p class="banner-shop-now">Shop Now <i class="fa fa-caret-right"></i>
                            </p>
                        </div>
                    </div>',
            'block_id' => $block->id,
            'widget_width' => 6,
            'widget_order' => 1,
            'status' => 'active',
        ),
    );

    foreach ($widgets as $widget) {
        \Corals\Modules\CMS\Models\Widget::updateOrCreate(
            ['block_id' => $widget['block_id'], 'title' => $widget['title']],
            $widget
        );
    }
}
