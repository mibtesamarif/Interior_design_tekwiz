<?php 
include('header.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the input data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $house = $_POST['house'];
    $postalCode = $_POST['postalCode'];
    $message = $_POST['message'];
    
    $userId = $_SESSION['user_id']; // Assuming user ID is stored in the session

    // Calculate total price from cart
    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $item) {
        $totalPrice += $item['p_price'] * $item['p_qty'];
    }

    // Insert order
    $orderQuery = $pdo->prepare("INSERT INTO orders (user_id, shipping_address, city, postal_code, total_price, message) VALUES (:user_id, :shipping_address, :city, :postal_code, :total_price, :message)");
    $orderQuery->bindParam(':user_id', $userId);
    $orderQuery->bindParam(':shipping_address', $address);
    $orderQuery->bindParam(':city', $city);
    $orderQuery->bindParam(':postal_code', $postalCode);
    $orderQuery->bindParam(':total_price', $totalPrice);
    $orderQuery->bindParam(':message', $message);
    $orderQuery->execute();
    $orderId = $pdo->lastInsertId();

    // Insert invoice
    $invoiceQuery = $pdo->prepare("INSERT INTO invoices (order_id, user_id, billing_address, city, postal_code, total_amount) VALUES (:order_id, :user_id, :billing_address, :city, :postal_code, :total_amount)");
    $invoiceQuery->bindParam(':order_id', $orderId);
    $invoiceQuery->bindParam(':user_id', $userId);
    $invoiceQuery->bindParam(':billing_address', $address);
    $invoiceQuery->bindParam(':city', $city);
    $invoiceQuery->bindParam(':postal_code', $postalCode);
    $invoiceQuery->bindParam(':total_amount', $totalPrice);
    $invoiceQuery->execute();
    $invoiceId = $pdo->lastInsertId();

    // Insert items into invoice_items
    foreach ($_SESSION['cart'] as $item) {
        $productId = $item['p_id'];
        $quantity = $item['p_qty'];
        $unitPrice = $item['p_price'];

        $invoiceItemQuery = $pdo->prepare("INSERT INTO invoice_items (invoice_id, product_id, quantity, unit_price) VALUES (:invoice_id, :product_id, :quantity, :unit_price)");
        $invoiceItemQuery->bindParam(':invoice_id', $invoiceId);
        $invoiceItemQuery->bindParam(':product_id', $productId);
        $invoiceItemQuery->bindParam(':quantity', $quantity);
        $invoiceItemQuery->bindParam(':unit_price', $unitPrice);
        $invoiceItemQuery->execute();
    }

    // Clear the cart
    unset($_SESSION['cart']);

    // Redirect to the invoice page
    echo "<script>alert('Order placed successfully!'); location.assign('invoice.php?invoice_id=$invoiceId');</script>";
}

?>

<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 mb-4">
                <div class="card mb-4 border shadow-0">
                    <div class="p-4 d-flex justify-content-between">
                        <div>
                            <h5>Have an account?</h5>
                            <p class="mb-0 text-wrap text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-center flex-column flex-md-row">
                            <a href="signup.php" class="btn btn-primary shadow-0 text-nowrap w-100">Sign in</a>
                        </div>
                    </div>
                </div>

                <!-- Checkout -->
                <div class="card shadow-0 border">
                    <div class="p-4">
                        <h5 class="card-title mb-3 text-white">Checkout</h5>
                        <form id="checkoutForm" method="POST" action="checkout.php" novalidate onsubmit="return validateForm();">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <p class="mb-0 text-white">First name</p>
                                    <div class="form-outline">
                                        <input type="text" name="firstName" id="firstName" placeholder="Type here" class="form-control" required />
                                        <small class="text-danger" id="firstNameError"></small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 text-white">Last name</p>
                                    <div class="form-outline">
                                        <input type="text" name="lastName" id="lastName" placeholder="Type here" class="form-control" required />
                                        <small class="text-danger" id="lastNameError"></small>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <p class="mb-0 text-white">Phone</p>
                                    <div class="form-outline">
                                        <input type="tel" name="phone" id="phone" placeholder="+92" class="form-control" required />
                                        <small class="text-danger" id="phoneError"></small>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <p class="mb-0 text-white">Email</p>
                                    <div class="form-outline">
                                        <input type="email" name="email" id="email" placeholder="example@gmail.com" class="form-control" required />
                                        <small class="text-danger" id="emailError"></small>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4" />

                            <h5 class="card-title mb-3 text-white">Shipping info</h5>

                            <div class="row">
                                <div class="col-sm-8 mb-3">
                                    <p class="mb-0 text-white">Address</p>
                                    <div class="form-outline">
                                        <input type="text" name="address" id="address" placeholder="Enter Address" class="form-control" required />
                                        <small class="text-danger" id="addressError"></small>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <p class="mb-0 text-white">City</p>
                                    <div class="form-outline">
                                        <input type="text" name="city" id="city" placeholder="Enter City" class="form-control" required />
                                        <small class="text-danger" id="cityError"></small>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <p class="mb-0 text-white">House</p>
                                    <div class="form-outline">
                                        <input type="text" name="house" id="house" placeholder="Type here" class="form-control" required />
                                        <small class="text-danger" id="houseError"></small>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-3">
                                    <p class="mb-0 text-white">Postal code</p>
                                    <div class="form-outline">
                                        <input type="text" name="postalCode" id="postalCode" class="form-control" placeholder="Type here" required />
                                        <small class="text-danger" id="postalCodeError"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <p class="mb-0 text-white">Message to seller</p>
                                <div class="form-outline">
                                    <textarea name="message" class="form-control" id="messageToSeller" rows="2"></textarea>
                                    <small class="text-danger" id="messageError"></small>
                                </div>
                            </div>

                            <div class="float-end">
                                <button type="button" class="btn btn-light" onclick="window.location.href='index.php'">Cancel</button>
                                <button type="submit" class="btn btn-primary shadow-0 border">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Checkout -->
            </div>

            <div class="col-xl-4 col-lg-4 d-flex justify-content-center justify-content-lg-end">
                <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
                    <h6 class="mb-3">Summary</h6>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Total price:</p>
                        <p class="mb-2">$<?php echo $totalPrice; ?></p>
                    </div>

                    <hr />
                    <h6 class="text-dark my-4">Items in cart</h6>

                    <?php if (isset($_SESSION['cart'])): ?>
                        <?php foreach ($_SESSION['cart'] as $item): ?>
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-3 position-relative">
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                                        <?php echo $item['p_qty']; ?>
                                    </span>
                                    <img src="dashmin_panel/img/<?php echo $item['p_image']; ?>" style="height: 96px; width: 96px;" class="img-sm rounded border" />
                                </div>
                                <div>
                                    <a href="#" class="nav-link text-black">
                                        <?php echo $item['p_name']; ?><br />
                                        <div class="price text-muted">Total: $<?php echo number_format($item['p_price'] * $item['p_qty'], 2); ?></div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No items in the cart.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function validateForm() {
    let valid = true;
    document.querySelectorAll('small').forEach(el => el.innerHTML = '');

    // Validate each field
    const fields = ['firstName', 'lastName', 'phone', 'email', 'address', 'city', 'house', 'postalCode'];
    fields.forEach(field => {
        const value = document.getElementById(field).value;
        if (value === "") {
            document.getElementById(field + 'Error').innerHTML = field.replace(/([A-Z])/g, ' $1').trim() + " is required.";
            valid = false;
        }
    });

    const phone = document.getElementById('phone').value;
    const phonePattern = /^[+]{1}[0-9]{11,14}$/;
    if (!phone.match(phonePattern)) {
        document.getElementById('phoneError').innerHTML = "Enter a valid phone number.";
        valid = false;
    }

    const email = document.getElementById('email').value;
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!email.match(emailPattern)) {
        document.getElementById('emailError').innerHTML = "Enter a valid email address.";
        valid = false;
    }

    return valid;
}
</script>

<?php 
include('footer.php');
?>
