export default function FeedItem({ feed }) {
    return (
        <div className="_feed_inner_area _feed_post _mar_b16">

            <div className="_feed_top">

                <div className="_feed_top_left">

                    <div className="_feed_top_image">
                        <img
                            src={
                                feed.user?.avatar ||
                                "/assets/images/profile.png"
                            }
                            alt=""
                            className="_feed_top_img"
                        />
                    </div>

                    <div className="_feed_top_txt">

                        <h4 className="_feed_top_title">
                            {feed.user?.first_name}
                            {" "}
                            {feed.user?.last_name}
                        </h4>

                        <p className="_feed_top_para">
                            {feed.created_at}
                        </p>

                    </div>

                </div>

            </div>

            <div className="_feed_post_txt">

                <p>
                    {feed.content}
                </p>

            </div>

            <div className="_feed_post_bottom">

                <button
                    type="button"
                    className="_feed_post_bottom_link"
                >
                    👍 {feed.likes_count}
                </button>

                <button
                    type="button"
                    className="_feed_post_bottom_link"
                >
                    💬 {feed.comments?.length || 0}
                </button>

            </div>

        </div>
    );
}