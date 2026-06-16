export default function MobileNavbar() {

    return (
        <div className="_header_mobile_menu">

            <div className="_header_mobile_menu_wrap">

                <div className="container">

                    <div className="_header_mobile_menu_top_inner">

                        <div
                            className="_header_mobile_menu_logo"
                        >
                            <a href="/feed">

                                <img
                                    src="/assets/images/logo.svg"
                                    alt=""
                                    className="_nav_logo"
                                />

                            </a>
                        </div>

                        <div
                            className="_header_mobile_menu_right"
                        >

                            <button
                                className="btn btn-link"
                            >
                                Search
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    );
}