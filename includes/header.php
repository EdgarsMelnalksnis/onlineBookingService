<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Integrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex flex-col">
    <header class="bg-white shadow-md p-4">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">📆 Booking Integrator</h1>
            <nav class="space-x-4">
                <a href="index.php" class="text-blue-600 hover:underline">Home</a>
                <a href="contact.php" class="text-blue-600 hover:underline">Contact</a>
<!-- Google Calendar Appointment Scheduling begin -->
<link href="https://calendar.google.com/calendar/scheduling-button-script.css" rel="stylesheet">
<script src="https://calendar.google.com/calendar/scheduling-button-script.js" async></script>
<script>
(function() {
  var target = document.currentScript;
  window.addEventListener('load', function() {
    calendar.schedulingButton.load({
      url: 'https://calendar.google.com/calendar/appointments/schedules/AcZssZ02fSQ10uXsQLeUOePhGDIrk-Fm3fFDFqS9aVtqwOGP8vrlBMVNP0CNu8Dp496ltxtBZnXlA8wZ?gv=true',
      color: '#EF6C00',
      label: 'Book an appointment',
      target,
    });
  });
})();
</script>
<!-- end Google Calendar Appointment Scheduling -->
            </nav>
        </div>
    </header>
    <main class="flex-grow max-w-4xl mx-auto px-4 py-8">
