const StoriesSection = () => {
    const stories = [
        {
            id: 1,
            name: "Ryan Roslansky",
            image: "/assets/images/card_ppl2.png",
        },
        {
            id: 2,
            name: "Ryan Roslansky",
            image: "/assets/images/card_ppl3.png",
        },
        {
            id: 3,
            name: "Ryan Roslansky",
            image: "/assets/images/card_ppl4.png",
        },
    ];

    return (
        <>
            {/* Desktop Stories */}

            <div className="_feed_inner_ppl_card _mar_b16">
                <div className="row">

                    <div className="col-xl-3 col-lg-3 col-md-4 col-sm-4 col">
                        <div className="_feed_inner_profile_story _b_radious6">
                            <div className="_feed_inner_profile_story_image">
                                <img
                                    src="/assets/images/card_ppl1.png"
                                    alt=""
                                    className="_profile_story_img"
                                />

                                <div className="_feed_inner_story_txt">
                                    <p className="_feed_inner_story_para">
                                        Your Story
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {stories.map((story) => (
                        <div
                            key={story.id}
                            className="col-xl-3 col-lg-3 col-md-4 col-sm-4 col"
                        >
                            <div className="_feed_inner_public_story _b_radious6">
                                <div className="_feed_inner_public_story_image">
                                    <img
                                        src={story.image}
                                        alt=""
                                        className="_public_story_img"
                                    />

                                    <div className="_feed_inner_pulic_story_txt">
                                        <p className="_feed_inner_pulic_story_para">
                                            {story.name}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            </div>

            {/* Mobile Stories */}

            <div className="_feed_inner_ppl_card_mobile _mar_b16">
                <div className="_feed_inner_ppl_card_area">
                    <ul className="_feed_inner_ppl_card_area_list">

                        <li className="_feed_inner_ppl_card_area_item">
                            <a href="#">
                                <div className="_feed_inner_ppl_card_area_story">
                                    <img
                                        src="/assets/images/mobile_story_img.png"
                                        alt=""
                                        className="_card_story_img"
                                    />
                                </div>

                                <p>Your Story</p>
                            </a>
                        </li>

                        {stories.map((story) => (
                            <li
                                key={story.id}
                                className="_feed_inner_ppl_card_area_item"
                            >
                                <a href="#">
                                    <div className="_feed_inner_ppl_card_area_story_active">
                                        <img
                                            src="/assets/images/mobile_story_img1.png"
                                            alt=""
                                            className="_card_story_img1"
                                        />
                                    </div>

                                    <p className="_feed_inner_ppl_card_area_txt">
                                        {story.name}
                                    </p>
                                </a>
                            </li>
                        ))}
                    </ul>
                </div>
            </div>
        </>
    );
};

export default StoriesSection;