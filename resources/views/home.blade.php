<x-layout pagename="Homepage">
    <x-nav></x-nav>
    <div class="flex flex-row justify-between">
        <div
            class='cc-2 m-5 bg-cc-2 text-slate-50 p-5 border-[3px] border-slate-50 rounded-2xl flex flex-col max-h-min max-w-[60%]'>
            <h1 class="text-4xl font-bold mb-4 whitespace-nowrap">Welcome to Silly Cats!</h1>
            <p>Welcome to Silly Cats, where each cat has its own spotlight! Here, you’ll find a collection of individual
                cats
                featuring only the silliest, most lovable cats from around the world. Every profile showcases one
                cat photo along with its name, a short description, and tags that highlight its unique personality and
                quirks.</p>
            <br>
            <p>Want to meet a cat named Whiskers who loves climbing into impossible spaces? Or perhaps Luna, who’s a
                master
                of dramatic poses? Each cat's profile lets you get to know their story and the little things that make
                them
                special.</p>
            <br>
            <p>Our community members can upload entries of their (or other's) cats, adding a picture, fun descriptions,
                and tags to
                capture their cat’s unique traits. Whether your cat is a “couch potato,” “shadow chaser,” or “treat
                hunter,”
                these tags let everyone get a quick peek into each cat’s personality.</p>
            <br>
            <p>With every visit, you'll discover new furry friends, from playful kittens to wise old tabbies. So jump
                in,
                browse our growing collection of lovable cats, and find your favorites. Silly Cats is here to celebrate
                the
                individuality and charm of each of our four-legged friends!</p>
        </div>
        <div
            class='cc-2 m-5 bg-gray-800 text-slate-50 p-5 border-[3px] border-slate-50 rounded-2xl flex flex-col justify-between max-w-[60%]'>
            <h1 class="text-4xl font-bold whitespace-nowrap">Recently added</h1>
            <x-cat :cat="$recentCat" :list="true"></x-cat>
        </div>
    </div>
</x-layout>
