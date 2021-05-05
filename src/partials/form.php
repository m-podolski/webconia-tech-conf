 <section
   id="contact"
   class="contact-form"
 >
   <h2>Anmeldung</h2>
   <form
     method="post"
     action="src/controller/form-controller.php"
     class="form contact-form"
   >
     <div class="honeypot">
       <label for="website">Website <abbr title="required">*</abbr></label>
       <input
         type="website"
         id="website"
         name="website"
         tabindex="-1"
         class="honey"
       />
     </div>
     <label for="name">
       <?php echo $microcopy["form-first"]; ?>
       <abbr title="required">*</abbr>
     </label>
     <input
       type="text"
       id="firstname"
       name="firstname"
       value="<?php echo htmlspecialchars($_SESSION["firstname"]); ?>"
       placeholder="<?php echo $microcopy["form-first-plh"]; ?>"
       pattern="^(?:[- a-zA-Z\u00c4-\u00fd]{2,30}){1,3}$"
       required
     />

     <p class="error-info noerror">
       <?php echo $microcopy["form-first-err"]; ?>
     </p>

     <label for="name">
       <?php echo $microcopy["form-last"]; ?>
       <abbr title="required">*</abbr>
     </label>
     <input
       type="text"
       id="lastname"
       name="lastname"
       value="<?php echo htmlspecialchars($_SESSION["lastname"]); ?>"
       placeholder="<?php echo $microcopy["form-last-plh"]; ?>"
       pattern="^(?:[- a-zA-Z\u00c4-\u00fd]{2,30}){1,3}$"
       required
     />
     <p class="error-info noerror">
       <?php echo $microcopy["form-last-err"]; ?>
     </p>

     <label for="organisation">
       <?php echo $microcopy["form-org"]; ?>
     </label>
     <input
       type="text"
       id="organisation"
       name="organisation"
       value="<?php echo htmlspecialchars($_SESSION["organisation"]); ?>"
       placeholder="<?php echo $microcopy["form-org-plh"]; ?>"
       pattern="^[a-zA-Z0-9\.-\u00c4-\u00df\s]{2,100}$"
     />

     <p class="error-info noerror">
       <?php echo $microcopy["form-org-err"]; ?>
     </p>

     <label for="email">
       <?php echo $microcopy["form-email"]; ?>
       <abbr title="required">*</abbr>
     </label>
     <input
       type="email"
       id="email"
       name="email"
       value="<?php echo htmlspecialchars($_SESSION["email"]); ?>"
       placeholder="<?php echo $microcopy["form-last-plh"]; ?>"
       required
     />

     <p class="error-info noerror">
       <?php echo $microcopy["form-email-err"]; ?>
     </p>

     <button
       type="submit"
       name="submit"
       value="Submit"
       class="button-primary button-submit"
       autocomplete="off"
     >
       <?php echo $microcopy["form-submit"]; ?>
     </button>
   </form>
 </section>
