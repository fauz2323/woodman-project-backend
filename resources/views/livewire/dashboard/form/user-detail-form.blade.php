<div class="row">
    <div class="col-sm-12">
        <div class="card p-0">
            <div class="card-body p-0">
                <div class="profile-content">
                    <ul class="nav nav-underline nav-justified gap-0">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#aboutme" type="button" role="tab"
                                aria-controls="home" aria-selected="true" href="#aboutme">About</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#edit-profile" type="button" role="tab"
                                aria-controls="home" aria-selected="true"
                                href="#edit-profile">Settings</a></li>
                    </ul>

                    <div class="tab-content m-0 p-4">
                        <div class="tab-pane active" id="aboutme" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="profile-desk">
                                <h5 class="text-uppercase fs-17 text-dark">Johnathan Deo</h5>
                                <div class="designation mb-4">PRODUCT DESIGNER (UX / UI / Visual
                                    Interaction)</div>
                                <p class="text-muted fs-16">
                                    I have 10 years of experience designing for the web, and
                                    specialize
                                    in the areas of user interface design, interaction design,
                                    visual
                                    design and prototyping. I’ve worked with notable startups
                                    including
                                    Pearl Street Software.
                                </p>

                                <h5 class="mt-4 fs-17 text-dark">Contact Information</h5>
                                <table class="table table-condensed mb-0 border-top">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Url</th>
                                            <td>
                                                <a href="#" class="ng-binding">
                                                    www.example.com
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>
                                                <a href="" class="ng-binding">
                                                    jonathandeo@example.com
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td class="ng-binding">(123)-456-7890</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Skype</th>
                                            <td>
                                                <a href="#" class="ng-binding">
                                                    jonathandeo123
                                                </a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div> <!-- end profile-desk -->
                        </div> <!-- about-me -->

                        <!-- settings -->
                        <div id="edit-profile" class="tab-pane">
                            <div class="user-profile-content">
                                <form>
                                    <div class="row row-cols-sm-2 row-cols-1">
                                        <div class="mb-2">
                                            <label class="form-label" for="FullName">Full
                                                Name</label>
                                            <input type="text" value="John Doe" id="FullName"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="Email">Email</label>
                                            <input type="email" value="first.last@example.com"
                                                id="Email" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="web-url">Website</label>
                                            <input type="text" value="Enter website url"
                                                id="web-url" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="Username">Username</label>
                                            <input type="text" value="john" id="Username"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="Password">Password</label>
                                            <input type="password" placeholder="6 - 15 Characters"
                                                id="Password" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="RePassword">Re-Password</label>
                                            <input type="password" placeholder="6 - 15 Characters"
                                                id="RePassword" class="form-control">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label" for="AboutMe">About Me</label>
                                            <textarea style="height: 125px;" id="AboutMe"
                                                class="form-control">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit"><i
                                            class="ri-save-line me-1 fs-16 lh-1"></i> Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
