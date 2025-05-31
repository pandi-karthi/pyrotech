<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #444;
            color: white;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        #customerDetails {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #333;
            padding: 20px;
            background-color: #f5f5f5;
        }
        #customerDetails h3 {
            margin-bottom: 15px;
        }
        #customerDetails input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #customerDetails button,
        #downloadPdfBtn {
            padding: 12px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        #downloadPdfBtn {
            background-color: #007bff;
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>

<h2>Order Summary & Customer Details</h2>

<?php
$orderData = json_decode($_POST['order_data'], true);
if (!$orderData || empty($orderData['items'])) {
    echo "<p style='color:red; text-align:center;'>⚠️ No valid items found in the order.</p>";
    exit;
}
?>

<div id="pdfContent"><!-- Wrapper for PDF capture -->
    <!-- ORDER SUMMARY -->
    <table>
        <tr>
            <th>Product Name</th>
            <th>Price (40%)</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>

        <?php foreach ($orderData['items'] as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td>₹<?= number_format($item['price'], 2) ?></td>
                <td><?= (int)$item['qty'] ?></td>
                <td>₹<?= number_format($item['subtotal'], 2) ?></td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td colspan="3" style="text-align: right;"><strong>Grand Total</strong></td>
            <td><strong>₹<?= number_format($orderData['grandTotal'], 2) ?></strong></td>
        </tr>
    </table>

    <!-- CUSTOMER DETAILS -->
    <div id="customerDetails">
    <h3>Customer Details</h3>
    <form action="process_order.php" method="POST" onsubmit="return confirmBooking()">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="phone" placeholder="Phone Number" required>
        <input type="text" name="address" placeholder="Shipping Address" required>
        <input type="text" name="subject" value="New Order" hidden>
        <textarea name="message" hidden>
Order Details:
Full Name: [Auto fill using JS or PHP if needed]
Phone: [Include order summary here or send separately]
        </textarea>
        <button type="submit">Place Order</button>
    </form>
</div>
</div>

<!-- DOWNLOAD PDF BUTTON -->
<button id="downloadPdfBtn">Download PDF</button>

<!-- SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
function confirmBooking() {
    alert('✅ Your booking is confirmed! Thank you for your purchase.');
    return false; // prevent default submit
}

document.getElementById('downloadPdfBtn').addEventListener('click', function () {
    const { jsPDF } = window.jspdf;

    const pdfContent = document.querySelector("#pdfContent");

    html2canvas(pdfContent, {
        scale: 2, // higher scale for better quality
        useCORS: true
    }).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jsPDF('p', 'mm', 'a4');
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();

        const imgWidth = pageWidth;
        const imgHeight = canvas.height * imgWidth / canvas.width;

        let position = 0;

        // Add page if content exceeds one page
        if (imgHeight < pageHeight) {
            pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
        } else {
            let heightLeft = imgHeight;
            while (heightLeft > 0) {
                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
                if (heightLeft > 0) {
                    pdf.addPage();
                    position = -pageHeight;
                }
            }
        }

        pdf.save("order-summary.pdf");
    });
});

</script>

</body>
</html>
