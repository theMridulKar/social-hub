import { useState, useEffect } from "react";

import Navbar from "../Components/Layout/Navbar";
import MobileNavbar from "../Components/Layout/MobileNavbar";
import MobileBottomNavigation from "../Components/Layout/MobileBottomNavigation";

import LeftSidebar from "../Components/Layout/LeftSidebar";
import RightSidebar from "../Components/Layout/RightSidebar";

import StoriesSection from "../Components/Layout/StoriesSection";

import CreatePostCard from "../Components/Feed/CreatePostCard";
import FeedPostCard from "../Components/Feed/FeedPostCard";

import CreatePostDTO from "../../Application/DTOs/CreatePostDTO";

import CreatePostUseCase from "../../Application/UseCases/Post/CreatePostUseCase";
import GetFeedUseCase from "../../Application/UseCases/Feed/GetFeedUseCase";

import ApiPostRepository from "../../Infrastructure/Repositories/ApiPostRepository";
import ApiFeedRepository from "../../Infrastructure/Repositories/ApiFeedRepository";

import TogglePostLikeUseCase from "../../Application/UseCases/Like/TogglePostLikeUseCase";
import ApiLikeRepository from "../../Infrastructure/Repositories/ApiLikeRepository";

import CreateCommentDTO from "../../Application/DTOs/CreateCommentDTO";
import CreateCommentUseCase from "../../Application/UseCases/Comment/CreateCommentUseCase";
import ApiCommentRepository from "../../Infrastructure/Repositories/ApiCommentRepository";

import CreateReplyDTO from "../../Application/DTOs/CreateReplyDTO";
import CreateReplyUseCase from "../../Application/UseCases/Reply/CreateReplyUseCase";
import ApiReplyRepository from "../../Infrastructure/Repositories/ApiReplyRepository";

import ToggleCommentLikeUseCase from "../../Application/UseCases/Like/ToggleCommentLikeUseCase";
import ToggleReplyLikeUseCase from "../../Application/UseCases/Like/ToggleReplyLikeUseCase";

const postRepository = new ApiPostRepository();
const createPostUseCase = new CreatePostUseCase(postRepository);

const feedRepository = new ApiFeedRepository();
const getFeedUseCase = new GetFeedUseCase(feedRepository);

const likeRepository = new ApiLikeRepository();
const togglePostLikeUseCase = new TogglePostLikeUseCase(likeRepository);

const commentRepository = new ApiCommentRepository();
const createCommentUseCase = new CreateCommentUseCase(commentRepository);

const replyRepository = new ApiReplyRepository();
const createReplyUseCase = new CreateReplyUseCase(replyRepository);

const toggleCommentLikeUseCase = new ToggleCommentLikeUseCase(likeRepository);
const toggleReplyLikeUseCase = new ToggleReplyLikeUseCase(likeRepository);

export default function FeedPage() {

    const [posts, setPosts] = useState([]);

    // const handleCreatePost = async (content) => {
    //     try {
    //         const dto = new CreatePostDTO(content);
    //         const response = await createPostUseCase.execute(dto);

    //         setPosts((prev) => [
    //             response.data,
    //             ...prev,
    //         ]);
    //     } catch (error) {
    //         console.error("Create Post Error:",error);
    //     }
    // };

    const handleCreatePost = async (content) => {
        try {

            const dto =
                new CreatePostDTO(content);

            await createPostUseCase.execute(dto);

            await loadFeed();

        } catch (error) {

            console.error(
                "Create Post Error:",
                error
            );
        }
    };

    const loadFeed = async () => {
        try {
            const response = await getFeedUseCase.execute();
            console.log("Feed Response:", response);
            setPosts(response.data ?? response);

        } catch (error) {
            console.error("Feed Error:",error);
        }
    };

    useEffect(() => {
        loadFeed();
    }, []);

    const handlePostLike = async (postId) => {
        try {
            await togglePostLikeUseCase.execute(postId);
            await loadFeed();
        } catch (error) {
            console.error("Like Error:",error);
        }
    };

    const handleCreateComment = async (postId, content) => {
        try {
            const dto =
                new CreateCommentDTO(
                    postId,
                    content
                );
            await createCommentUseCase.execute(dto);
            await loadFeed();
        } catch (error) {
            console.error(
                "Comment Error:",
                error
            );
        }
    };

    const handleCreateReply = async (commentId, content) => {
        try {
            const dto =
                new CreateReplyDTO(
                    commentId,
                    content
                );
            await createReplyUseCase.execute(dto);
            await loadFeed();
        } catch (error) {
            console.error("Reply Error:", error);
        }
    };

    const handleCommentLike = async (commentId) => {
        try {
            await toggleCommentLikeUseCase.execute(commentId);
            await loadFeed();
        } catch (error) {
            console.error(error);
        }
    };


    const handleReplyLike = async (replyId) => {
        try {
            await toggleReplyLikeUseCase.execute(replyId);
            await loadFeed();
        } catch (error) {
            console.error(error);
        }
    };

    return (
        <div className="_layout _layout_main_wrapper">

            <div className="_main_layout">

                <Navbar />

                <MobileNavbar />

                <MobileBottomNavigation />

                <div className="container _custom_container">

                    <div className="_layout_inner_wrap">

                        <div className="row">

                            <LeftSidebar />

                            <div className="col-xl-6 col-lg-6 col-md-12 col-sm-12">

                                <div className="_layout_middle_wrap">

                                    <div className="_layout_middle_inner">

                                        <StoriesSection />

                                        <CreatePostCard
                                            onCreatePost={
                                                handleCreatePost
                                            }
                                        />

                                        {posts.length === 0 && (
                                            <p>
                                                No posts found
                                            </p>
                                        )}

                                        {posts.map(
                                            (post) => (
                                           <FeedPostCard
                                                key={post.id}
                                                post={post}
                                                onLike={handlePostLike}
                                                onCreateComment={handleCreateComment}
                                                onCreateReply={handleCreateReply}
                                                onCommentLike={handleCommentLike}
                                                onReplyLike={handleReplyLike}
                                            />
                                             )
                                        )}

                                    </div>

                                </div>

                            </div>

                            <RightSidebar />

                        </div>

                    </div>

                </div>

            </div>

        </div>
    );
}