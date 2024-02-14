<!-- CTRL + i to invoke GitHub Copilot -->

<!DOCTYPE html>
<html>
<head>
    <title>Lab 5 - PHP</title>
    <?php include "inc/head.inc.php"; ?>
</head>

<body>
    <?php include "inc/nav.inc.php"; ?>
    <?php include "inc/header.inc.php"; ?>
    <main class="container">
        <section id="dogs">
            <h2>All About Dogs!</h2>
            <div class="row">
                <article class="col-sm">
                    <h3>Poodles</h3>
                    <figure>
                        <img src="images/poodle_small.jpg" data-large="images/poodle_large.jpg" class="img-thumbnail" alt="Poodle" title="View larger image..."/>
                        <figcaption>Standard Poodle</figcaption>
                    </figure>
                    <p>
                        Poodles are a group of formal dog breeds, the Standard
                        Poodle, Miniature Poodle and Toy Poodle...
                    </p>
                </article>
                <article class="col-sm">
                    <h3>Chihuahua</h3>
                    <figure>
                        <img src="images/chihuahua_small.jpg" data-large="images/chihuahua_large.jpg" class="img-thumbnail" alt="Chihuahua" title="View larger image..."/>
                        <figcaption>Chihuahua</figcaption>
                    </figure>
                    <p>
                        The Chihuahua is the smallest breed of dog, and is named
                        after the Mexican state of Chihuahua...
                    </p>
                </article>
            </div>
        </section>
        <section id="cats">
            <h2>All About Cats!</h2>
            <div class="row">
                <article class="col-sm">
                    <h3>Tabby</h3>
                    <figure>
                        <img src="images/tabby_small.jpg" data-large="images/tabby_large.jpg" class="img-thumbnail" alt="Tabby" title="View larger image..."/>
                        <figcaption>Tabby Cat</figcaption>
                    </figure>
                    <p>
                        A tabby is any domestic cat with a distinctive 'M' shaped marking on its forehead, stipes by its eyes
                        and across its cheeks.
                    </p>
                </article>
                <article class="col-sm">
                    <h3>Calico</h3>
                    <figure>
                        <img src="images/calico_small.jpg" data-large="images/calico_large.jpg" class="img-thumbnail" alt="Calico" title="View larger image..."/>
                        <figcaption>Calico Cat</figcaption>
                    </figure>
                    <p>
                        A calico cat is a domestic cat of any breed with a tri-color coat. The calico cat is most commonly though of as 
                        being typically 25% to 75% white with large orange and black patches.
                    </p>
                </article>
            </div>
        </section>
    </main>
    <?php include "inc/footer.inc.php"; ?>

    <!-- Javascript bootstraps 
    modal bootstrap for soft popup, tabindex="-1": non-accessible via sequential keyboard (TABS), 
    but focused with JavaScript. Good for elements requiring conditions 

    modal-dialog: the "popup" box
    modal-content: the content of the "popup" box
    modal-body: the body of the "popup" box -->
    
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="popupImage" src="" style="width: 100%; height: auto;">
                    <figcaption id="popupCaption"></figcaption>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
