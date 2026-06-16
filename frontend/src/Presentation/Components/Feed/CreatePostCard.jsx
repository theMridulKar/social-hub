import { useState } from "react";

export default function CreatePostCard({onCreatePost}) {
    const [content, setContent] = useState("");

    const handleSubmit = async () => {
        if (!content.trim()) {
            return;
        }
        await onCreatePost(content);
        setContent("");
    };

    return (
        <div className="_feed_inner_text_area _b_radious6 _padd_b24 _padd_t24 _padd_r24 _padd_l24 _mar_b16">

            <div className="_feed_inner_text_area_box">

                <div className="_feed_inner_text_area_box_image">
                    <img
                        src="/assets/images/txt_img.png"
                        alt="Profile"
                        className="_txt_img"
                    />
                </div>

                <div className="form-floating _feed_inner_text_area_box_form">

                    <textarea
                        className="form-control _textarea"
                        placeholder="Write something..."
                        value={content}
                        onChange={(e) =>
                            setContent(
                                e.target.value
                            )
                        }
                    />

                    <label className="_feed_textarea_label">
                        Write something ...
                    </label>

                </div>

            </div>

            <div className="_feed_inner_text_area_bottom">

                <div className="_feed_inner_text_area_item">

                    <button
                        type="button"
                        className="_feed_inner_text_area_bottom_photo_link"
                    >
                        Photo
                    </button>

                    <button
                        type="button"
                        className="_feed_inner_text_area_bottom_photo_link"
                    >
                        Video
                    </button>

                    <button
                        type="button"
                        className="_feed_inner_text_area_bottom_photo_link"
                    >
                        Event
                    </button>

                    <button
                        type="button"
                        className="_feed_inner_text_area_bottom_photo_link"
                    >
                        Article
                    </button>

                </div>

                <div className="_feed_inner_text_area_btn">

                    <button
                        type="button"
                        className="_feed_inner_text_area_btn_link"
                        onClick={handleSubmit}
                    >
                        Post
                    </button>

                </div>

            </div>

        </div>
    );
}