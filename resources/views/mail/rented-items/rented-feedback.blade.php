<x-mail::message>
# Dear {{ $rented_item->user->name }}, this is to notify that the item you rented has been returned to the renter successfully.

Please provide feedback on the item and the renter. Thank you!

<x-mail::button :url='route("product-details", ["category" => $rented_item->product->productCategory->slug, "sub_category" => $rented_item->product->productSubCategory->slug, "slug" => $rented_item->product->slug])'>
Add Feedback
</x-mail::button>

Thanks,<br>
E-Wave Team
</x-mail::message>

