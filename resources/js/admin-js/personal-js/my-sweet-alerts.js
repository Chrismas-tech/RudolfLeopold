import { SweetAlert } from "./SweetAlert";

$(function () {
    if ($(".delete-sweet-alert-product").length) {
        const swt_product_delete = new SweetAlert(
            ".delete-sweet-alert-product",
            undefined,
            "Do you really want to delete these Product(s) ?",
            undefined,
            "#form_delete_entry"
        );
    }

    if ($(".delete-sweet-alert-product-options").length) {
        const swt_delete_product_options = new SweetAlert(
            ".delete-sweet-alert-product-options",
            undefined,
            "Do you really want to delete these Product Option(s) ?",
            undefined,
            "#form_delete_entry"
        );
    }

    if ($(".delete-sweet-alert-music-tracks").length) {
        const swt_delete_music_tracks = new SweetAlert(
            ".delete-sweet-alert-music-tracks",
            undefined,
            "Do you really want to delete these Music Track(s) ?",
            undefined,
            "#form_delete_entry"
        );
    }

    if ($(".delete-sweet-alert-photos").length) {
        const swt_delete_photos = new SweetAlert(
            ".delete-sweet-alert-photos",
            undefined,
            "Do you really want to delete these Photo(s) ?",
            undefined,
            "#form_delete_entry"
        );
    }

    if ($(".delete-sweet-alert-youtube-videos").length) {
        const swt_delete_youtube_videos = new SweetAlert(
            ".delete-sweet-alert-youtube-videos",
            undefined,
            "Do you really want to delete these Youtube Video(s)?",
            undefined,
            "#form_delete_entry"
        );
    }

    if ($(".delete-sweet-alert-product-reviews").length) {
        const swt_delete_product_reviews = new SweetAlert(
            ".delete-sweet-alert-product-reviews",
            undefined,
            "Do you really want to delete these Product Review(s)?",
            undefined,
            "#form_delete_entry"
        );
    }

    if ($(".pending-sweet-alert-product-review").length) {
        const swt_pending_product_review = new SweetAlert(
            ".pending-sweet-alert-product-review",
            undefined,
            "Do you really want to set this review in pending ?",
            undefined,
            "#form_product_review_pending"
        );
    }

    if ($(".approve-sweet-alert-product-review").length) {
        const swt_approve_product_review = new SweetAlert(
            ".approve-sweet-alert-product-review",
            undefined,
            "Do you really want to approve this Product Review ?",
            undefined,
            "#form_product_review_approve"
        );
    }

    if ($(".sweet-alert-product-clone").length) {
        let swt_clone_product = new SweetAlert(
            ".sweet-alert-product-clone",
            undefined,
            "Do you really want to duplicate this product ?",
            undefined,
            "clone"
        );
    }
});
