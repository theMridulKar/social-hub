import CommentForm from "./CommentForm";

export default function CommentCard({
    comment,
    onReply,
    onCommentLike,
    onReplyLike,
}) {

    return (
        <div className="_timline_comment_main">

            <div className="_comment_main">

                <div className="_comment_image">

                    <a
                        href="#"
                        className="_comment_image_link"
                    >
                        <img
                            src="/assets/images/txt_img.png"
                            alt=""
                            className="_comment_img1"
                        />
                    </a>

                </div>

                <div className="_comment_area">

                    <div className="_comment_details">

                        <div className="_comment_details_top">

                            <div className="_comment_name">

                                <a href="#">

                                    <h4 className="_comment_name_title">
                                        {comment.user?.first_name}
                                        {" "}
                                        {comment.user?.last_name}
                                    </h4>

                                </a>

                            </div>

                        </div>

                        <div className="_comment_status">

                            <p className="_comment_status_text">
                                <span>
                                    {comment.content}
                                </span>
                            </p>

                        </div>

                        <div className="_total_reactions">

                            <div className="_total_react">

                                <span className="_reaction_like">
                                    👍
                                </span>

                            </div>

                            <span className="_total">
                                {comment.likes_count ?? 0}
                            </span>

                        </div>

                        <div className="_comment_reply">

                            <div className="_comment_reply_num">

                                <ul className="_comment_reply_list">

                                    <li>
                                        <button
                                            type="button"
                                            style={{
                                                border: "none",
                                                background: "transparent",
                                            }}
                                            onClick={() =>
                                                onCommentLike(
                                                    comment.id
                                                )
                                            }
                                        >
                                            Like
                                        </button>
                                    </li>

                                    <li>
                                        <span>
                                            Reply
                                        </span>
                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                    <CommentForm
                        onSubmit={(content) =>
                            onReply(
                                comment.id,
                                content
                            )
                        }
                    />

                    {comment.replies?.length > 0 && (

                        <div
                            style={{
                                marginLeft: "50px",
                                marginTop: "15px",
                            }}
                        >

                            {comment.replies.map(
                                (reply) => (

                                    <div
                                        key={reply.id}
                                        className="_comment_details"
                                    >

                                        <div className="_comment_name">

                                            <h4 className="_comment_name_title">

                                                {
                                                    reply.user?.first_name
                                                }
                                                {" "}
                                                {
                                                    reply.user?.last_name
                                                }

                                            </h4>

                                        </div>

                                        <div className="_comment_status">

                                            <p className="_comment_status_text">

                                                {reply.content}

                                            </p>

                                        </div>

                                        <div className="_total_reactions">

                                            <span className="_total">

                                                {reply.likes_count ?? 0}

                                            </span>

                                        </div>

                                        <div className="_comment_reply">

                                            <ul className="_comment_reply_list">

                                                <li>

                                                    <button
                                                        type="button"
                                                        style={{
                                                            border: "none",
                                                            background: "transparent",
                                                        }}
                                                        onClick={() =>
                                                            onReplyLike(
                                                                reply.id
                                                            )
                                                        }
                                                    >
                                                        Like
                                                    </button>

                                                </li>

                                            </ul>

                                        </div>

                                    </div>

                                )
                            )}

                        </div>

                    )}

                </div>

            </div>

        </div>
    );
}