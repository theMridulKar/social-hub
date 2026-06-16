import CommentForm from "./CommentForm";
import CommentCard from "./CommentCard";

export default function FeedPostCard({
    post,
    onLike,
    onCreateComment,
    onCreateReply,
    onCommentLike,
    onReplyLike,
}) {

    const likesCount = post.likes_count ?? post.likesCount ?? 0;

    const commentsCount = post.comments_count ?? post.commentsCount ?? 0;

    return (
        <div className="_feed_inner_timeline_post_area _b_radious6 _padd_b24 _padd_t24 _mar_b16">

            <div className="_feed_inner_timeline_content _padd_r24 _padd_l24">

                <div className="_feed_inner_timeline_post_top">

                    <div className="_feed_inner_timeline_post_box">

                        <div className="_feed_inner_timeline_post_box_image">
                            <img
                                src="/assets/images/post_img.png"
                                alt=""
                                className="_post_img"
                            />
                        </div>

                        <div className="_feed_inner_timeline_post_box_txt">
                            <h4 className="_feed_inner_timeline_post_box_title">
                                {post.user?.first_name}
                                {" "}
                                {post.user?.last_name}
                            </h4>

                            <p className="_feed_inner_timeline_post_box_para">
                                {post.created_at}
                                {" • "}
                                <span>Public</span>
                            </p>
                        </div>

                    </div>

                </div>

                <h4 className="_feed_inner_timeline_post_title">
                    {post.content}
                </h4>

                {post.image && (
                    <div className="_feed_inner_timeline_image">
                        <img
                            src={post.image}
                            alt=""
                            className="_time_img"
                        />
                    </div>
                )}

            </div>

            <div className="_feed_inner_timeline_total_reacts _padd_r24 _padd_l24 _mar_b26">

                <div className="_feed_inner_timeline_total_reacts_txt">

                    <p className="_feed_inner_timeline_total_reacts_para1">
                        <span>
                            {commentsCount}
                        </span>
                        {" "}
                        Comments
                    </p>

                    <p className="_feed_inner_timeline_total_reacts_para2">
                        <span>
                            {likesCount}
                        </span>
                        {" "}
                        Likes
                    </p>

                </div>

            </div>

            <div className="_feed_inner_timeline_reaction">

                <button
                    type="button"
                    className="_feed_inner_timeline_reaction_emoji _feed_reaction"
                    onClick={() => onLike(post.id)}
                >
                    Like
                </button>

                <button
                    type="button"
                    className="_feed_inner_timeline_reaction_comment _feed_reaction"
                >
                    Comment
                </button>

                <button
                    type="button"
                    className="_feed_inner_timeline_reaction_share _feed_reaction"
                >
                    Share
                </button>

            </div>

            <CommentForm
                onSubmit={(content) =>
                    onCreateComment(
                        post.id,
                        content
                    )
                }
            />

            {post.comments?.map(
                (comment) => (
                    <CommentCard
                        key={comment.id}
                        comment={comment}
                        onReply={onCreateReply}
                        onCommentLike={onCommentLike}
                        onReplyLike={onReplyLike}
                    />
                )
            )}

        </div>
    );
}