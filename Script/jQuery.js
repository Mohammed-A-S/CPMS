$(document).ready(function()
{
    $(".status_of_paid #paid").show();
    $(".status_of_paid #not_paid").hide();
});

$(document).ready(function()
{
    $(".status_of_paid #paid").click(function()
    {
        $(".status_of_paid #paid").hide();
        $(".status_of_paid #not_paid").show();
    });
});